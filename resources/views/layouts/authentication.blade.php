<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <script>
        if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
            document.querySelector('html').classList.remove('dark');
            document.querySelector('html').style.colorScheme = 'light';
        } else {
            document.querySelector('html').classList.add('dark');
            document.querySelector('html').style.colorScheme = 'dark';
        }

    </script>
</head>

<body class="antialiased text-gray-600 bg-gray-100 font-inter dark:bg-gray-900 dark:text-gray-400">

    <main class="bg-white dark:bg-gray-900">

        <div class="relative flex">

            <!-- Content -->
            <div class="w-full bg-[#283593]">

                <div class="min-h-[100dvh] h-full flex flex-col justify-center ">
                    <div class="w-full max-w-sm px-4 py-8 mx-auto bg-[#90CAF9] rounded-2xl">
                        {{ $slot }}
                    </div>
                </div>

            </div>

            <!-- Image -->
            <!-- <div class="absolute top-0 bottom-0 right-0 hidden md:block md:w-1/2" aria-hidden="true">
                <img class="object-cover object-center w-full h-full" src="{{ asset('images/logo.jpg') }}" width="760"
                    height="1024" alt="Authentication image" />
            </div> -->

        </div>

    </main>

    @livewireScriptConfig
</body>

</html>
