<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @yield('meta')
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" 
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
              integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
              crossorigin="anonymous" 
              referrerpolicy="no-referrer" />
        <link rel="icon" href="image/logolink.png"/>
        <!-- start css -->
        <link href="{{ url('css/normalize/normalize.css') }}" rel="stylesheet">
        <link href="{{ url('css/Bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/toastr/toastr.min.css') }}" rel="stylesheet">
        <!-- end css -->
        <!-- start js  -->
        <script defer  src="{{ url('js/jquery.js') }}"></script>
        <script defer  src="{{ url('js/toastr/toastr.min.js') }}"></script>
        <!-- end js  -->




        @vite(['resources/css/headerandfooter/Header.css',
               'resources/js/headerandfooter/Header.js'])
        <title>@yield('title')</title>

    </head>
    <body>
        <!-- start header  -->
        <header class="header">
            @yield('header')
            @yield('navbar')
            @yield('sign')
        </header> 
        <!-- end header  -->
        <!-- <h1>index</h1>   
        <h1>@yield('footer')</h1>    -->
        @yield('script apis google')
    </body>
</html>