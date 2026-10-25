<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Novel</title>
    <!-- Memanggil CSS Bootstrap agar tampilan rapi -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- Bagian Navigasi Atas -->
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/novels">📚 Inventaris Koleksi Novel</a>
        </div>
    </nav>

    <!-- Bagian Konten Utama -->
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
