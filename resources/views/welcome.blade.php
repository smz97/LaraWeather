<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaraWeather</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-indigo-100">

    <div id="app" class="flex justify-center pt-10">
        <weather-app></weather-app>

    </div>

    <div class="footer w-full py-5 ">
        <p class="text-center text-gray-800"> Educational purpose only </p>
    </div>

    </body>
    <script src="{{ mix('/js/app.js') }}"></script>
</html>
