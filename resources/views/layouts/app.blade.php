<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan Custom CSS -->
    <style>
        /* Efek hover pada navbar brand (judul MyApp) */
        .navbar-brand:hover {
            color: #007bff;
            transition: color 0.3s ease-in-out;
        }

        /* Efek hover pada link navigasi */
        .navbar-nav .nav-link:hover {
            color: #007bff;
            transition: color 0.3s ease-in-out;
        }

        /* Efek hover pada tombol Logout */
        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
            border-color: #dc3545;
            transition: all 0.3s ease-in-out;
        }

        /* Tambahkan margin-top untuk konten utama agar tidak tertutup navbar */
        main {
            margin-top: 70px; /* Sesuaikan dengan tinggi navbar */
        }

        /* Animasi transparansi pada navbar */
        .navbar {
            transition: background-color 0.4s ease, opacity 0.4s ease; /* Smooth transition */
            background-color: rgba(255, 255, 255, 1); /* Set background color default */
        }

        /* Navbar transparan saat scroll */
        .navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.8); /* Set transparansi */
            opacity: 0.9;
        }

        /* Gaya footer */
        footer {
            background-color: #f8f9fa; /* Warna latar belakang footer */
            color: #343a40; /* Warna teks footer */
        }

        /* Gaya untuk link di footer */
        footer a {
            color: #343a40;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        footer a:hover {
            color: #007bff;
        }

        /* Gaya untuk card */
        .card {
            border-color: #007bff; /* Border sesuai tema */
            background-color: #f0f8ff; /* Latar belakang card biru muda */
        }

        /* Warna header card sesuai tema */
        .card-header {
            background-color: #007bff; /* Biru tema */
            color: #fff; /* Teks putih */
        }

        /* Warna tombol sesuai tema */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid d-flex justify-content-between">
                <!-- Judul di Kiri -->
                <a class="navbar-brand" href="{{ route('home') }}">MyApp</a>

                <!-- Daftar (ul, li) di Tengah -->
                <div class="collapse navbar-collapse justify-content-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('books.index') }}">Books</a>
                        </li>
                    </ul>
                </div>

                <!-- Tombol Logout di Kanan -->
                {{-- <form action="{{ route('logout') }}" method="POST" class="mb-0"> --}}
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            </div>
        </nav>
    </header>

    <main class="py-4">
        @yield('content')

        <!-- Form untuk mengirimkan saran -->
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Kirimkan Saran Anda</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('suggestions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="suggestion">Saran</label>
                            <textarea class="form-control" id="suggestion" name="suggestion" rows="3" placeholder="Masukkan saran Anda" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Saran</button>
                    </form>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </main>

    <footer class="bg-light text-dark py-4">
        <div class="container">
            <div class="row">
                <!-- Kolom pertama: Tentang Kami -->
                <div class="col-md-4">
                    <h5>Tentang Kami</h5>
                    <p class="small">
                        My Application adalah platform yang memberikan solusi terbaik untuk manajemen buku. Kami berdedikasi untuk memberikan layanan terbaik bagi pengguna kami.
                    </p>
                </div>
    
                <!-- Kolom kedua: Navigasi -->
                <div class="col-md-4">
                    <h5>Navigasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('books.index') }}">Books</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                    </ul>
                </div>
    
                <!-- Logika Favorit -->
                @auth
                    @if(auth()->user()->favorites->contains($book->id))
                        <form action="{{ route('books.unfavorite', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus dari Favorit</button>
                        </form>
                    @else
                        <form action="{{ route('books.favorite', $book->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Tambah ke Favorit</button>
                        </form>
                    @endif
                @endauth
    
                <!-- Kolom ketiga: Kontak -->
                <div class="col-md-4">
                    <h5>Kontak Kami</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope"></i> ferdinandsianturi28@gmail.com</li>
                        <li><i class="fas fa-phone"></i> +6282172892090</li>
                        <li><i class="fas fa-map-marker-alt"></i> Indonesian</li>
                    </ul>
                </div>
            </div>
    
            <!-- Garis Pemisah -->
            <hr class="my-4">
    
            <!-- Bagian Hak Cipta -->
            <div class="row">
                <div class="col text-center">
                    <p class="mb-0 small">&copy; {{ date('Y') }} My Application. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- Tambahkan Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tambahkan JavaScript untuk animasi transparansi -->
    <script>
        // Mengubah navbar menjadi transparan saat scroll
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 50) { // Jika scroll lebih dari 50px
                $('.navbar').addClass('scrolled');
            } else {
                $('.navbar').removeClass('scrolled');
            }
        });
    </script>
    <!-- Tambahkan FontAwesome untuk ikon -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
