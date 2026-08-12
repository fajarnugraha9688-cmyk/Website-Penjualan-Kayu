<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>{{ $title ?? 'Dashboard Admin' }}</title>

</head>

<body class="bg-gray-100">

<div class="min-h-screen flex flex-col">

    {{-- Header --}}
    @include('partials.admin.header')

    <div class="flex flex-1">

        {{-- Sidebar --}}
        @include('partials.admin.sidebar')

        {{-- Content --}}
        <main class="flex-1 p-8">

            @yield('content')

        </main>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@stack('scripts')

</body>

</html>