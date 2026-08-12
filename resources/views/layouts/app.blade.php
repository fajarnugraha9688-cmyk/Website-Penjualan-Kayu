<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $title ?? 'Mekar Mandiri' }}</title>
</head>

<body class="bg-gray-50">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Isi Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- JavaScript dari setiap halaman --}}
    @stack('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>