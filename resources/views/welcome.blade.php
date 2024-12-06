<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Aplikasi Pengaduan Masyarakat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #03010F; /* Biru sangat gelap hampir hitam */
            --secondary-color: #060229; /* Biru tua pekat */
            --light-color: #DCE3F0; /* Biru muda terang untuk teks */
            --accent-color: #3A7CA5; /* Biru cerah sebagai aksen */
        }
        body {
            background-color: var(--primary-color);
            color: var(--light-color);
            font-family: Arial, sans-serif;
        }
        .hero {
            background-color: var(--secondary-color);
            padding: 100px 0;
            text-align: center;
            border-bottom: 2px solid var(--accent-color);
        }
        .hero h1 {
            font-size: 2.8rem;
            font-weight: bold;
            color: var(--light-color);
        }
        .hero p {
            font-size: 1.2rem;
            margin-top: 10px;
            color: var(--light-color);
        }
        .btn-custom {
            font-size: 1.2rem;
            padding: 10px 20px;
            border-radius: 50px;
        }
        .btn-light-custom {
            background-color: var(--accent-color);
            color: var(--light-color);
            border: 2px solid var(--accent-color);
        }
        .btn-light-custom:hover {
            background-color: var(--light-color);
            color: var(--secondary-color);
            border-color: var(--light-color);
        }
        .btn-outline-custom {
            border-color: var(--light-color);
            color: var(--light-color);
        }
        .btn-outline-custom:hover {
            background-color: var(--light-color);
            color: var(--secondary-color);
            border-color: var(--light-color);
        }
        .section-title {
            color: var(--accent-color);
        }
        footer {
            background-color: var(--secondary-color);
            color: var(--light-color);
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
            border-top: 2px solid var(--accent-color);
        }
        footer a {
            color: var(--accent-color);
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header class="hero">
        <h1>Selamat Datang di Aplikasi Pengaduan Masyarakat</h1>
        <p>"Wadah Aspirasi, Solusi Transparansi"</p>
        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-light-custom btn-custom mx-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-custom btn-custom mx-2">Register</a>
        </div>
    </header>

    <main class="container my-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold section-title">Kenapa Menggunakan Aplikasi Kami?</h2>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <img src="https://via.placeholder.com/100" alt="Cepat" class="mb-3">
                <h5 class="fw-bold">Cepat</h5>
                <p>Kami memastikan laporan Anda diterima dan ditangani secepat mungkin.</p>
            </div>
            <div class="col-md-4">
                <img src="https://via.placeholder.com/100" alt="Mudah" class="mb-3">
                <h5 class="fw-bold">Mudah</h5>
                <p>Sampaikan pengaduan kapan saja, di mana saja hanya dengan beberapa klik.</p>
            </div>
            <div class="col-md-4">
                <img src="https://via.placeholder.com/100" alt="Transparan" class="mb-3">
                <h5 class="fw-bold">Transparan</h5>
                <p>Pantau perkembangan laporan Anda secara real-time.</p>
            </div>
        </div>
    </main>

    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
