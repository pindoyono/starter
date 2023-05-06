<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


<body class="dark:bg-zinc-800">
    <!--Main Navigation-->
    <header>
        <!-- Sidenav -->
        <x-side />
        <!-- Sidenav -->

        <!-- Navbar -->
        <x-navbar />

        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 100px">
        <div class="mt-10 lg:pl-[240px]" id="page-content" style="margin-right: 0px; transition: all 0.3s linear 0s;">
            <div
                class=" prose dark:prose-invert max-w-[540px] sm:max-w-[604px] md:max-w-[720px] lg:max-w-[972px] xl:max-w-full xl:px-12 2xl:max-w-[1400px] mx-auto flex">
                <div class="flex flex-col w-full h-full ">
                    @isset($slot)
                        {{ $slot }}
                    @endisset
                </div>
            </div>
        </div>
    </main>
    <!--Main layout-->
    @livewireScripts

    <!--Footer-->
    <footer></footer>
    <!--Footer-->
</body>

</html>
