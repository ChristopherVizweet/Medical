<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" sizes="16x16"  href="/favicons/favicon-16x16.png">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

        <title>{{ ('Login-MGSI') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 sha bg-gray-100 dark:bg-gray-700">
            <div class="justify-items-end self-end mr-10 mb-10">
                <!--Boton para cambiar el modo oscuro/claro-->
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
                </script>
                
            </div>
            <div>
                <a href="">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-3xl mt-6 px-6 py-4 bg-white dark:bg-gray-600 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
    
</html>
