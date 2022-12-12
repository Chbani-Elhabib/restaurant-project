<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- start icon -->
    <link rel="icon" href="{{ url('image/logolink.png') }}" />
    <!-- end icon -->
    <!-- start css -->
    <link rel="stylesheet" 
              href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
              integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
              crossorigin="anonymous" 
              referrerpolicy="no-referrer" />
    <link href="{{ url('css/normalize/normalize.css') }}" rel="stylesheet">
    <link href="{{ url('css/Bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/toastr/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    @yield('css')
    <!-- end css -->
    <!-- start js -->
    <script defer  src="{{ url('js/jquery/jquery.js') }}"></script>
    <script defer  src="{{ url('js/toastr/toastr.min.js') }}"></script>
    <script defer src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- end js -->

</head>
<body>
    <!-- start header  -->
    @yield('header')
    <!-- end header  -->
    <!-- start navlist  -->
    @yield('nav')
    <!-- end navlist  -->
    <!-- start content -->
    <div class="content">
        @yield('content')
    </div>
    <!-- end content -->
    <!-- start js -->
    @yield('js')
    <!-- end js -->
</body>
</html>