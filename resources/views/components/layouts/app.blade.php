<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <wireui:scripts />
        <title>{{ env('APP_NAME') ?? 'Page Title' }}</title>
        

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
        {{ $slot }}
    </body>
</html>
