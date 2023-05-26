@extends('html.Html')
@extends('headerandfooter/Header')
@section('title','Profile')

@section('css')
@vite(['resources/css/Profile.css' ])
@endsection

@section('contant')
    <section>
        <article class="profile">
            <h1>My profile</h1>
            <div class="contant-profile mt-3 ">
                
                <div class="d-flex ">
                    <p>UserName :</p>
                    <p class="ms-3" >{{$Person->UserName}}</p>
                </div>

                <div class="d-flex ">
                    <p>Email :</p>
                    <p class="ms-3" >{{$Person->Email}}</p>
                </div>
                
                <div class="d-flex ">
                    <p>FullName :</p>
                    <p class="ms-3">{{$Person->FullName}}</p>
                </div>
                
                <div class="d-flex ">
                    <p>Telf :</p>
                    <p class="ms-3" >{{$Person->Telf}}</p>
                </div>

                <div class="d-flex ">
                    <p>Country :</p>
                    <p class="ms-3" >{{$Person->Country}}</p>
                </div>

                <div class="d-flex ">
                    <p>Regions :</p>
                    <p class="ms-3" >{{$Person->Regions}}</p>
                </div>

                <div class="d-flex ">
                    <p>city :</p>
                    <p class="ms-3" >{{$Person->city}}</p>
                </div>

                <div class="d-flex">
                    <p>Address :</p>
                    <p class="ms-3" >{{$Person->Address}}</p>
                </div>
                
            </div>
        </article>
    </section>
@endsection