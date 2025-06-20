<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" sizes="16x16"  href="/favicons/favicon-16x16.png">
        <title>{{ 'Medical Gas Sistem International'}}</title>
        

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-800">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-700 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                 <!--Boton para cambiar el modo oscuro/claro
                <x-mode-button id="theme-toggle" class="setMode">
                    Modo escuro/claro
                </x-mode-button>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const themeToggle = document.getElementById("theme-toggle");
                        const body = document.documentElement; 
                        const currentTheme = localStorage.getItem("theme");
                
                        if (currentTheme === "dark") {
                            body.classList.add("dark");
                        } else {
                            body.classList.remove("dark");
                        }
                
                        themeToggle.addEventListener("click", function () {
                            if (body.classList.contains("dark")) {
                                body.classList.remove("dark");
                                localStorage.setItem("theme", "light");
                            } else {
                                body.classList.add("dark");
                                localStorage.setItem("theme", "dark");
                            }
                        });
                    });
                </script>-->
                {{ $slot }}
            </main>
        </div>
        <style>
    @keyframes fadeOut {
        0% { opacity: 1; }
        90% { opacity: 1; }
        100% { opacity: 0; display: none; }
    }

    .fade-out {
        animation: fadeOut 4s forwards;
    }
</style>
    </body>
</html>
