<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce</title>
    <link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">    
    <script src="https://kit.fontawesome.com/1aac63f784.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</head>
<body>
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
</body>
</html>