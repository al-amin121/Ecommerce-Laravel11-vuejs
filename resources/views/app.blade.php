<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home|{{ env('APP_NAME')}}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body id="app" class="overflow-x-hidden font-pop" >
    </body>
</html>
