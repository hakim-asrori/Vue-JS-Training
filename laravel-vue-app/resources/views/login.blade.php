<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan VUE</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('assets/css/laravel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('/assets/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/laravel.js') }}"></script>
    <script src="{{ asset('/assets/plugins/sweetalert2/dist/sweetalert2.all.js') }}"></script>
</head>

<body>

    <div id="app">
        <login-component></login-component>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
