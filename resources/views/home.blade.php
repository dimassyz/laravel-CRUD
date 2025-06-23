<!DOCTYPE html>
<html>

<head>
    <title>CRUD Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #dee2e6);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .btn-lg {
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="card p-5" style="width: 100%; max-width: 500px;">
        <h3 class="text-center mb-4">Aplikasi CRUD Laravel</h3>
        <p class="text-center text-muted">Silakan pilih mode CRUD yang ingin digunakan:</p>

        <div class="d-grid gap-3">
            <a href="{{ route('pasien.index') }}" class="btn btn-primary btn-lg">CRUD Synchronous</a>
            <a href="{{ url('/pasien-async') }}" class="btn btn-success btn-lg">CRUD Asynchronous (AJAX)</a>
        </div>
    </div>

</body>

</html>
