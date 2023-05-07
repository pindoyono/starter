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
    <link rel="shortcut icon" href="{{ url(asset('favicon.png')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @powerGridStyles
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-white dark:bg-gray-900">
    <!--Main Navigation-->
    <header>
        {{-- sidenav --}}
        <x-side />
        {{-- sidenav --}}


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

    <x-footer />
    <div class=" z-[1055]">
        @livewire('livewire-ui-modal')
    </div>
    @powerGridScripts
    @livewireScripts

    {{-- <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script> --}}
    {{-- <x-livewire-alert::flash /> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />


</body>

</html>
