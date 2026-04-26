<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'AppStock') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-white text-gray-900 border-t-4 border-blue-600">
        <div class="flex min-h-screen">
            
            <aside class="hidden md:flex md:flex-col w-64 bg-white border-r border-gray-300">
                
                <div class="h-16 flex items-center px-6 border-b border-gray-300 bg-gray-50">
                    <a href="{{ url('/') }}" class="flex items-center gap-2">
                        <span class="text-sm font-black text-gray-900 uppercase tracking-tighter">
                            ELEKTRONIK STORE
                        </span>
                    </a>
                </div>

                <div class="flex-1 py-6 px-4 space-y-4">
                    <nav class="space-y-1">
                        <a href="{{ route('products.index') }}" 
                           class="flex items-center gap-3 px-3 py-2.5 rounded text-xs font-bold transition-all
                           {{ request()->routeIs('products.*') ? 'bg-blue-600 text-white shadow' : 'text-gray-700 hover:bg-gray-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            KETERSEDIAAN BARANG
                        </a>
                    </nav>
                </div>

                </aside>

            <div class="flex-1 flex flex-col min-w-0">
                @include('layouts.navigation')

                <main class="flex-1 bg-white">
                    @if (isset($header))
                        <header class="bg-gray-100 border-b border-gray-300 py-4 px-6">
                            <div class="max-w-7xl mx-auto">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    <div class="max-w-7xl mx-auto py-6">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>