@extends('html.Html')
@extends('headerandfooter/Header')
@extends('headerandfooter/Footer')
@section('title','FAQ')

@section('meta')
<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
@endsection

@section('script apis google')
<script src="https://apis.google.com/js/platform.js" async defer></script>
@endsection


@section('css')
@vite(['resources/css/Restrand.css'])
@endsection

@section('js')
@vite(['resources/js/Restrand.js'])
@endsection



@section('contant')
<div class='slide'>
    <div id="slidedemo"></div>
    <div class='logoreastrand'>
        <img src="images/tranding-food-4.png" alt="fdghff">
    </div>
    <div class='titlerestrand'>
        <div class='title-restrand'>
            <h1>chbani habib</h1>
        </div>
        <div class='body-restrand'>
            <div>
                <i class="fa-regular fa-clock"></i>
                <p>20-30</p>
            </div>
            <div>
                <i class="fa-solid fa-motorcycle"></i>
                <p>12.00 MAD</p>
            </div>
            <div>
                <i class="fa-regular fa-thumbs-up"></i>
                <p>50%</p>
            </div>
            <div>
                <i class="fa-regular fa-thumbs-up"></i>
                <p>50%</p>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection()