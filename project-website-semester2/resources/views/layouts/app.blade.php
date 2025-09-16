<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if (isset($title))
        {{ $title }} - {{ config('app.name', 'Laravel') }}
        @else
        {{ config('app.name', 'Laravel') }}
        @endif
    </title>


    <link rel="icon" href="{{ asset('images/letter-c.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- ... (meta tags, title, fonts lainnya yang sudah ada) ... --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> {{-- CSS SwiperJS --}}
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> {{-- JS SwiperJS --}}
    @stack('scripts') {{-- Pastikan ini ada --}}
    {{-- Jika Anda menggunakan @stack('scripts') di layout ini untuk script per halaman, biarkan.
         Script inisialisasi Swiper untuk home.blade.php akan kita @push ke sana.
         Jika tidak, script inisialisasi bisa langsung di home.blade.php --}}
    @include('layouts.partials.footer')

</body>

</html>