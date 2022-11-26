@extends('html.Html')
@extends('headerandfooter/Header')
@extends('headerandfooter/Footer')
@section('title','index')

@section('meta')
<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
@endsection

@section('css')
@vite(['resources/css/Index.css'])
@endsection

@section('js')
@vite(['resources/js/Index.js'])
@endsection



@section('script apis google')
<script src="https://apis.google.com/js/platform.js" async defer></script>
@endsection

@section('header')
<svg xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 1440 320">
    <path fill="#ffffff"
        fill-opacity="1" 
        d="M0,320L48,288C96,256,192,192,288,192C384,192,480,256,576,277.3C672,299,768,277,864,229.3C960,181,1056,107,1152,74.7C1248,43,1344,53,1392,58.7L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
    </path>
</svg>
@endsection

@section('silde-show')
<div class="silde_show">
    <div class="video">
        <video class="video1" autoplay="autoplay" loop="loop">
            <source src="video/animation.webm" type="video/webm" preload="auto">
        </video>
    </div>
    <div class="silde-adress">
        <h1>Restaurant service and food delivery</h1>
        <div class="show_adress">
            <div class="icon_adress">
                <i class="fa-solid fa-location-dot"></i>
                <i class="fa-solid fa-circle"></i>
            </div>
            <div class="text_adress">
                <p>What's your address?</p>
            </div>
        </div>
    </div>
</div>
<div class="recharge_adress">
</div>
@endsection()

@section('contant')
<div class="contant">
    <div class="top_restaurand">
        <div class="titlle_top_rest">
            <h1>The best meals in our restaurants</h1>
        </div>
        <div class="containerr contant_top_rest">
            <div class="cards">
                <div class="carde">
                    <img src="./imgs/pic1.jpg" alt="" />
                    <div class="card__content">
                        <h3>Heading 1</h3>
                    </div>
                </div>
                <div class="carde">
                    <img src="./imgs/pic2.jpg" alt="" />
                    <div class="card__content">
                        <h3>Heading 2</h3>
                    </div>
                </div>
                <div class="carde">
                    <img src="./imgs/pic3.jpg" alt="" />
                    <div class="card__content">
                        <h3>Heading 3</h3>
                    </div>
                </div> 
                <div class="carde">
                    <img src="./imgs/pic4.jpg" alt="" />
                    <div class="card__content">
                        <h3>Heading 4</h3>
                    </div>
                </div>
                <div class="carde">
                    <img src="./imgs/pic5.jpg" alt="" />
                    <div class="card__content">
                        <h3>Heading 5</h3>
                    </div>
                </div>
                <div class="carde">
                    <img src="./imgs/pic6.jpg" alt="" />
                    <div class="card__content">
                        <h3>Heading 6</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()