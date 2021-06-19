<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white flex flex-col justify-between">
        <div class="">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow mb-1">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @include('layouts.partials.header')
                </div>
            </header>

            <!-- Page Content -->
            <div class="max-w-7xl">

                <div class="h-full w-full">
                    @yield('content')
                </div>

            </div>
        </div>

        @include('layouts.partials.footer')
    </div>
    <!-- Script -->
    @livewireScripts
    <script text="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script text="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @include('flashy::message')
    @yield('script')
</body>

</html>