<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Artisan:admin</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!------------------------------------------------ -->

</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div id="app">

            <home></home>



        </div>
    </div>
</div>
</body>
<script src="../js/app.js" charset="utf-8"></script>
</html>
