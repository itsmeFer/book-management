<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <!-- Include CSS and other head elements -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles') <!-- Placeholder for additional styles in specific views -->
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('books.index') }}">Books</a></li>
                <!-- Add more navigation items as needed -->
            </ul>
        </nav>
    </header>

    <main>
        @yield('content') <!-- This will be replaced by content from specific views -->
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} My Application. All rights reserved.</p>
    </footer>

    <!-- Include JS files -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts') <!-- Placeholder for additional scripts in specific views -->
</body>
</html>
