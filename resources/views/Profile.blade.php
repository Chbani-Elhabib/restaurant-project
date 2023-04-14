@extends('html.Html')
@extends('headerandfooter/Header')
@extends('headerandfooter/Footer')
@section('title','Profile')

@section('css')
@vite(['resources/css/Profile.css' ])
@endsection

@section('js')
@vite(['resources/js/Profile.js'])
@endsection


@section('contant')
    <section class="sectionn">
        <div class="profile">
            <div class='imgae-user mt-3'>
                <img src="/ImageUsers/{{$Person->Photo}}" alt="image user">
            </div>
            <div class="body-profile mt-3">
                <h1>My profile</h1>
                <div class="contant-profile mt-3 ">
                    <div class="d-flex justify-content-between">
                        <p>FullName :</p>
                        <p class="ms-3">@if($Person->FullName != '') {{$Person->FullName}} @else ... @endif</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>UserName :</p>
                        <p class="ms-3" >@if($Person->UserName != '' ) {{$Person->UserName}} @else ... @endif</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Email :</p>
                        <p class="ms-3" >@if($Person->Email != '' ) {{$Person->Email}} @else ... @endif</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Telf :</p>
                        <p class="ms-3" >@if($Person->Telf != '' ) {{$Person->Telf}} @else ... @endif</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Country :</p>
                        <p class="ms-3" >@if($Person->Country != '' ) {{$Person->Country}} @else ... @endif</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Regions :</p>
                        <p class="ms-3" >@if($Person->Regions != '' ) {{$Person->Regions}} @else ... @endif</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>city :</p>
                        <p class="ms-3" >@if($Person->city != '' ) {{$Person->city}} @else ... @endif</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Address :</p>
                        <p class="ms-3" >@if($Person->Address != '' ) {{$Person->Address}} @else ... @endif</p>
                    </div>
                </div>
            </div>
        </div>
	</section>
@endsection