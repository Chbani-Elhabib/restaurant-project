<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" href="{{ url('css/admin/style.css') }}"/>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.24/r-2.2.7/rr-1.2.7/datatables.min.css"/> -->

    @yield('css')
    <!-- end css -->
    <!-- start js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script defer  src="{{ url('js/jquery/jquery.js') }}"></script>
     <script defer  src="{{ url('js/toastr/toastr.min.js') }}"></script>
     <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <!-- <script defer src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script> -->
     <!-- <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
     <script defer src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script defer type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.24/r-2.2.7/rr-1.2.7/datatables.min.js"></script> -->

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