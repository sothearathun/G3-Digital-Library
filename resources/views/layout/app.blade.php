<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Digitales')</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    @stack('styles')
</head>
<body>
    <x-navigation.header />

    <main class="container py-4">
        @yield('content')
    </main>

    <x-navigation.footer />
    
    <script src="{{ asset('js/homepage.js') }}"></script>
    @stack('scripts')
</body>
</html>