<!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Page -->
        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        @yield('body')
    </body>
</html>