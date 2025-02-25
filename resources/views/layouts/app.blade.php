<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <!-- FullCalendarのCSS -->
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">

        <!-- FullCalendarのJS -->
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

        <!-- jQuery（必要に応じて） -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- CSS -->
        <link href="{{ asset('css/attendance-record.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="app">
            
            @component('components.header')
            @endcomponent

            <main class="py-4">
                @yield('content')
            </main>
        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    
    </body>
</html>
