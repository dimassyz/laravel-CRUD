<!DOCTYPE html>
<html>

<head>
    <title>Pasien AJAX</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container py-4">

    <h1 class="mb-4">CRUD Pasien (AJAX)</h1>

    <form id="formPasien" class="mb-4">
        <input type="hidden" id="pasien_id">
        <div class="row g-2">
            <div class="col"><input type="text" id="nama" class="form-control" placeholder="Nama" required>
            </div>
            <div class="col"><input type="number" id="umur" class="form-control" placeholder="Umur" required>
            </div>
            <div class="col">
                <select id="jenis_kelamin" class="form-select">
                    <option value="">Pilih Gender</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="col"><input type="text" id="alamat" class="form-control" placeholder="Alamat" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered" id="tabelPasien">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>JK</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const form = document.getElementById('formPasien');
            const tableBody = document.querySelector('#tabelPasien tbody');

            function loadData() {
                fetch('/pasien-async/data')
                    .then(res => res.json())
                    .then(data => {
                        tableBody.innerHTML = '';
                        data.forEach((p, i) => {
                            tableBody.innerHTML += `
                        <tr>
                            <td>${i+1}</td>
                            <td>${p.nama}</td>
                            <td>${p.umur}</td>
                            <td>${p.jenis_kelamin}</td>
                            <td>${p.alamat}</td>
                            <td>
                                <button onclick="editPasien(${p.id})" class="btn btn-warning btn-sm">Edit</button>
                                <button onclick="hapusPasien(${p.id})" class="btn btn-danger btn-sm">Hapus</button>
                            </td>
                        </tr>
                    `;
                        });
                    });
            }

            window.editPasien = function(id) {
                fetch(`/pasien-async/edit/${id}`)
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('pasien_id').value = data.id;
                        document.getElementById('nama').value = data.nama;
                        document.getElementById('umur').value = data.umur;
                        document.getElementById('jenis_kelamin').value = data.jenis_kelamin;
                        document.getElementById('alamat').value = data.alamat;
                    });
            }

            window.hapusPasien = function(id) {
                if (confirm('Yakin ingin menghapus?')) {
                    fetch(`/pasien-async/delete/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrf
                        }
                    }).then(() => loadData());
                }
            }

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const id = document.getElementById('pasien_id').value;
                const data = {
                    nama: document.getElementById('nama').value,
                    umur: document.getElementById('umur').value,
                    jenis_kelamin: document.getElementById('jenis_kelamin').value,
                    alamat: document.getElementById('alamat').value,
                };

                const url = id ? `/pasien-async/update/${id}` : '/pasien-async/store';
                const method = id ? 'PUT' : 'POST';

                fetch(url, {
                    method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf
                    },
                    body: JSON.stringify(data)
                }).then(() => {
                    form.reset();
                    document.getElementById('pasien_id').value = '';
                    loadData();
                });
            });

            loadData();
        });
    </script>
</body>

</html>
