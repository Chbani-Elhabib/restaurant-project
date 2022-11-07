<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="image/logolink.png"/>
        <link href="{{ url('css/normalize/normalize.css') }}" rel="stylesheet">
        <link href="{{ url('css/Bootstrap.min.css') }}" rel="stylesheet">
        @vite(['resources/css/headerandfooter/Header.css'])
        <title>@yield('title')</title>
    </head>
    <body>
        <!-- start header  -->
        <header class="header">
            @yield('header')
            @yield('navbar')
        </header> 
        <!-- end header  -->
        <!-- <h1>index</h1>   
        <h1>@yield('footer')</h1>    -->
    </body>
</html>