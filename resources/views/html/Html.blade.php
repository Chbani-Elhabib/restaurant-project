<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @yield('meta')
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" 
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
              integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
              crossorigin="anonymous" 
              referrerpolicy="no-referrer" />
        <link rel="icon" href="{{ url('image/logolink.png') }}" />
        <!-- start css -->
        <link href="{{ url('css/normalize/normalize.css') }}" rel="stylesheet">
        <link href="{{ url('css/Bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/toastr/toastr.min.css') }}" rel="stylesheet">
        @vite(['resources/css/headerandfooter/Header.css','resources/css/headerandfooter/Footer.css'])
        @yield('css')
        <!-- end css -->
        <!-- start js  -->
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script defer  src="{{ url('js/jquery/jquery-3.2.1.js') }}"></script>
        <script defer  src="{{ url('js/toastr/toastr.min.js') }}"></script>
        <!-- end js  -->
        <title>@yield('title')</title>

    </head>
    <body id="top">
        <!-- start header  -->
        <header class="header">
            @yield('navbar')
            @yield('sign')
        </header> 
        <!-- end header  -->
        <!-- start contant    -->
        @yield('contant')
        <!-- end contant    -->
        <!-- start footer  -->
        @yield('footer')  
        <!-- end footer  -->
        @yield('script apis google')
        @vite(['resources/js/headerandfooter/Header.js','resources/js/headerandfooter/Footer.js'])
        @yield('js')
    </body>
</html>