<!DOCTYPE html>
<html lang="ar" dir="rtl" x-data="{ darkMode: localStorage.getItem('user_darkMode') === 'true' }" 
      x-init="$watch('darkMode', val => localStorage.setItem('user_darkMode', val))"
      :class="{ 'dark': darkMode }" x-cloak>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'لوحة التحكم' }} - خبرة لينك</title>

    <!-- Cairo Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css'])
    
    <!-- Alpine.js Cloak Style -->
    <style>
        [x-cloak] { 
            display: none !important; 
        }
        html[x-cloak] {
            display: block !important;
            visibility: hidden;
        }
        html:not([x-cloak]) {
            visibility: visible;
        }
    </style>
</head>
<body class="font-cairo antialiased bg-gray-50 dark:bg-slate-900">
    <!-- Navbar -->
    <x-navbar />

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white dark:bg-slate-800 shadow-sm border-b border-gray-200 dark:border-slate-700">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main class="py-8">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-footer />
    
    <!-- Scripts at end of body for faster page load -->
    @vite(['resources/js/app.js'])
</body>
</html>
