<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IT Ticketing System') }}</title>

    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
    ])

</head>

<body style="margin:0; background:#f5f7fb; color:#111827;">

    {{-- Navigation --}}
    @include('layouts.navigation')


    {{-- Optional Header --}}
    @isset($header)

    <header style="
            background:#ffffff;
            border-bottom:1px solid #e5e7eb;
        ">

        <div style="
                max-width:1280px;
                margin:0 auto;
                padding:20px 24px;
            ">

            {{ $header }}

        </div>

    </header>

    @endisset


    {{-- Main Page Content --}}

    <main>

        {{ $slot }}

    </main>


</body>

</html>