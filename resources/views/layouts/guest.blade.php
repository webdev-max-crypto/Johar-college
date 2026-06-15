<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Johar College') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 50%, #eff6ff 100%); min-height: 100vh; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #1d4ed8; border-radius: 10px; }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-10">

        {{-- Logo --}}
        <a href="/" class="flex flex-col items-center gap-2 mb-8 group">
            <div class="h-16 w-16 rounded-2xl border-2 border-blue-200 bg-white flex items-center justify-center shadow-md group-hover:shadow-lg transition overflow-hidden">
                <img src="https://th.bing.com/th/id/R.a82d90db5a67c90d20f8a99d9fef81aa?rik=oWjWjDrv8YzNjQ&riu=http%3a%2f%2fjoharcollege.info%2fImages%2fJSLogo.jpg&ehk=%2f4xdVtUN9MV5yBP5dM3mvmDs51rBBEnmPLBiv2hwmBk%3d&risl=&pid=ImgRaw&r=0"
                     alt="Johar College Logo" class="h-full w-full object-contain">
            </div>
            <div class="text-center">
                <div class="text-blue-800 font-extrabold text-xl leading-tight">Johar College</div>
                <div class="text-blue-400 text-xs mt-0.5">Quality Education • Bright Future</div>
            </div>
        </a>

        {{-- Card --}}
        <div class="w-full max-w-md bg-white rounded-3xl shadow-xl border border-blue-100 px-8 py-8">
            {{ $slot }}
        </div>

        <div class="mt-6 text-xs text-blue-400">© 2026 Johar College. All Rights Reserved.</div>
    </div>
</body>
</html>
