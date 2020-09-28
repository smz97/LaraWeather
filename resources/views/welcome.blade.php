<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaraWeather</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body class="bg-indigo-100">

    <div id="app" class="flex justify-center pt-10">
        <weather-app></weather-app>
    </div>

    </body>
    <script src="/js/app.js"></script>
</html>
