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
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Profile.js'])
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection


@section('content')
    <section class="sectionn">
        <div class="profile">
            <div class='imgae-user mt-3'>
                <img src="/ImageUsers/{{$Person->Photo}}" alt="image user">
            </div>
            <div class="body-profile mt-3">
                <h1>My profile</h1>
                <div class="contant-profile mt-3 ">
                    <div class="d-flex">
                        <p>FullName :</p>
                        <p class="ms-3">@if($Person->FullName != '') {{$Person->FullName}} @else Null @endif</p>
                    </div>
                    <div class="d-flex">
                        <p>UserName :</p>
                        <p class="ms-3" >@if($Person->UserName != '' ) {{$Person->UserName}} @else Null @endif</p>
                    </div>
                    <div class="d-flex">
                        <p>Email :</p>
                        <p class="ms-3" >@if($Person->Email != '' ) {{$Person->Email}} @else Null @endif</p>
                    </div>
                    <div class="d-flex">
                        <p>Telf :</p>
                        <p class="ms-3" >@if($Person->Telf != '' ) {{$Person->Telf}} @else Null @endif</p>
                    </div>
                    <div class="d-flex">
                        <p>Country :</p>
                        <p class="ms-3" >@if($Person->Country != '' ) {{$Person->Country}} @else Null @endif</p>
                    </div>
                    <div class="d-flex">
                        <p>Regions :</p>
                        <p class="ms-3" >@if($Person->Regions != '' ) {{$Person->Regions}} @else Null @endif</p>
                    </div>
                    <div class="d-flex">
                        <p>city :</p>
                        <p class="ms-3" >@if($Person->city != '' ) {{$Person->city}} @else Null @endif</p>
                    </div>
                    <div class="d-flex">
                        <p>Address :</p>
                        <p class="ms-3" >@if($Person->Address != '' ) {{$Person->Address}} @else Null @endif</p>
                    </div>
                </div>
            </div>
        </div>
	</section>
@endsection