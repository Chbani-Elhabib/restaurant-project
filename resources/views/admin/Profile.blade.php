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

        <div class="profile">
            <div class='imgae-user mt-3'>
                <img src="/ImageUsers/{{$Person->Photo}}" alt="image user">
            </div>
            <div>
                <h1>My profile</h1>
            </div>
        </div>

        <div class="user-information">
            
            <div class="d-flex">
                <p class="mb-0 @if($Person->UserName == '' ) indefand @endif ">UserName :</p>
                <p class="ms-3" >{{$Person->UserName}}</p>
            </div>
    
            <div class="d-flex">
                <p class="mb-0 @if($Person->Email == '' ) indefand @endif ">Email :</p>
                <p class="ms-3" >{{$Person->Email}}</p>
            </div>
    
            <div class="d-flex">
                <p class="mb-0 @if($Person->FullName == '' ) indefand  @endif ">FullName :</p>
                <p class="ms-3">{{$Person->FullName}}</p>
            </div>
    
            <div class="d-flex">
                <p class="mb-0 @if($Person->Telf == '' ) indefand @endif ">Telf :</p>
                <p class="ms-3" >{{$Person->Telf}}</p>
            </div>
    
            <div class="d-flex">
                <p class="mb-0 @if($Person->Country == '' ) indefand @endif ">Country :</p>
                <p class="ms-3" >{{$Person->Country}}</p>
            </div>
    
            <div class="d-flex">
                <p class="mb-0 @if($Person->Regions == '' ) indefand @endif ">Regions :</p>
                <p class="ms-3" >{{$Person->Regions}}</p>
            </div>
    
            <div class="d-flex">
                <p class="mb-0 @if($Person->city == '' ) indefand @endif ">city :</p>
                <p class="ms-3" >{{$Person->city}}</p>
            </div>
    
            
            <div class="d-flex">
                <p class="mb-0 @if($Person->Address == '' ) indefand @endif ">Address :</p>
                <p class="" >{{$Person->Address}} </p>
            </div>

        </div>
        
	</section>
@endsection