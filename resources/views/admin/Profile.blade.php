@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','Dashboard')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Profile.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js'])
@endsection


@section('content')
    <section class="sectionn">


        <div class="user-information">
            
            <div class="d-flex">
                <p class="mb-0">UserName :</p>
                <p class="ms-3" >{{$Person->UserName}}</p>
            </div>
    
            <div class="d-flex">
                <p class="mb-0">Email :</p>
                <p class="ms-3" >{{$Person->Email}}</p>
            </div>
    
            <div class="d-flex">
                <p class="mb-0">FullName :</p>
                <p class="ms-3">{{$Person->FullName}}</p>
            </div>
    
            <div class="d-flex">
                <p class="mb-0">Telf :</p>
                <p class="ms-3" >{{$Person->Telf}}</p>
            </div>
    
            <div class="d-flex">
                <p class="mb-0">Country :</p>
                <p class="ms-3" >{{$Person->Country}}</p>
            </div>
    
            <div class="d-flex">
                <p class="mb-0">Regions :</p>
                <p class="ms-3" >{{$Person->Regions}}</p>
            </div>
    
            <div class="d-flex">
                <p class="mb-0">city :</p>
                <p class="ms-3" >{{$Person->city}}</p>
            </div>
    
            
            <div class="d-flex">
                <p class="mb-0">Address :</p>
                <p class="" >{{$Person->Address}} </p>
            </div>

        </div>
        
	</section>
@endsection