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
    </main>

    <footer class="text-center py-4">
        <p>&copy; {{ date('Y') }} My Application. All rights reserved.</p>
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
</body>
</html>
