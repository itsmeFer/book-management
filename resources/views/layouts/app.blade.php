<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'My Application')</title>
    <!-- Include CSS file -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Placeholder for additional styles -->
    @yield('styles')
</head>
<body>
    <header>
        <!-- Navbar -->
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('books.index') }}">Books</a></li>
                <!-- Add more navigation items as needed -->
            </ul>
        </nav>
    </header>

    <main>
        <!-- Main content from specific views -->
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} My Application. All rights reserved.</p>
    </footer>

    <!-- Include JS files -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Placeholder for additional scripts -->
    @yield('scripts')
</body>
</html>
