<!DOCTYPE html>
<html>

<head>
    <title>Data Pasien</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container py-4">

    <h1>Daftar Pasien</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">+ Tambah Pasien</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pasiens as $index => $pasien)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pasien->nama }}</td>
                    <td>{{ $pasien->umur }}</td>
                    <td>{{ $pasien->jenis_kelamin }}</td>
                    <td>{{ $pasien->alamat }}</td>
                    <td>
                        <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST"
                            style="display:inline-block;" onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>
