@extends('html.Html')
<!-- @extends('headerandfooter/Header') -->
<!-- @extends('headerandfooter/Footer') -->
@section('title','index')

@section('meta')
<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
@endsection

@section('css')
<link rel="stylesheet" href="css/owl.carousel.min.css">
@vite(['resources/css/animate.css' , 'resources/css/Index.css' ])
@endsection

@section('js')
<script defer src="js/jquery.waypoints.min.js"></script>
<script defer  src="js/owl.carousel.min.js"></script>
@vite(['resources/js/animate.js' , 'resources/js/Index.js'])
@endsection



@section('script apis google')
<script src="https://apis.google.com/js/platform.js" async defer></script>
@endsection





@section('contant')
    <!-- Slide1 -->
	<section class="section-slide">
        <article>
            <div class="wrap-slick1">
                <div class="slick1">
                    <div class="item-slick1 item1-slick1" style="background-image: url(images/slide1-01.jpg);">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                            <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                                Welcome to
                            </span>
                            <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                                Pato Place
                            </h2>
                            <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                                <!-- Button1 -->
                                <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                    Look Menu
                                </a>
                            </div>
                        </div>
                    </div>
    
                    <div class="item-slick1 item2-slick1" style="background-image: url(images/slide1-02.jpg);">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                            <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
                                Welcome to
                            </span>
                            <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                                Pato Place
                            </h2>
                            <div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
                                <!-- Button1 -->
                                <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                    Look Menu
                                </a>
                            </div>
                        </div>
                    </div>
    
                    <div class="item-slick1 item3-slick1" style="background-image: url(images/slide1-03.jpg);">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                            <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                                Welcome to
                            </span>
                            <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                                Pato Place
                            </h2>
                            <div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
                                <!-- Button1 -->
                                <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                    Look Menu
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap-slick1-dots"></div>
            </div>
        </article>
        <article style="margin-bottom: 110px;">
            <div class="top_restaurand">
                <div class="titlle_top_rest">
                    <div>
                        <h1><span>The best meals</span> in</h1>
                        <h1>our restaurants</h1>

                    </div>
                </div>
                <div class="containerr contant_top_rest">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="owl-carousel owl-theme"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article>
            <div class="container-fluid">
                <h1 class="text-center mt-5 display-3 fw-bold">How It <span class="theme-text">Works</span></h1>
                <hr class="mx-auto mb-5 hr">
                <div class="row mb-5">
                    <div class="col-12 col-sm-6 col-md-3 m-auto">
                        <!-- card starts here -->
                        <div class="text-center" >
                            <img src="images/SelectRestaurant.png" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4><span>01</span>Select Restaurant</h4>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eligendi soluta est veniam sequi
                                    nemo,
                                </p>
                            </div>
                        </div>
                        <!-- card ends here -->
                    </div>
                    <!-- col ends here -->
                    <div class="col-12 col-sm-6 col-md-3 m-auto">
                        <!-- card starts here -->
                        <div class="text-center">
                            <img src="images/Selectmenu.png" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4><span>02</span>Select menu</h4>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eligendi soluta est veniam sequi
                                    nemo,
                                </p>
                            </div>
                        </div>
                        <!-- card ends here -->
                    </div>
                    <!-- col ends here -->
                    <div class="col-12 col-sm-6 col-md-3 m-auto">
                        <!-- card starts here -->
                        <div class="text-center">
                            <img src="images/Wait fordelivery.png" alt="" class="card-img-top">
                            <div class="card-body">
                                <h4><span>03</span>Wait for delivery</h4>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eligendi soluta est veniam sequi
                                    nemo,
                                </p>
                            </div>
                        </div>
                        <!-- card ends here -->
                    </div>
                    <!-- col ends here -->
                    <div class="col-12 col-sm-6 col-md-3 m-auto">
                        <!-- card starts here -->
                        <div class="text-start">
                            <img src="images/Dishdelivery.png" alt="" class="card-img-top">
                            <div class="card-body text-center">
                                <h4><span>04</span>Order delivery</h4>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eligendi soluta est veniam sequi
                                    nemo,
                                </p>
                            </div>
                        </div>
                        <!-- card ends here -->
                    </div>
                    <!-- col ends here -->
                </div>
            </div>
        </article>
        <article class='about'>
            <div class="container">
                <div class="about-banner">
                    <img src="/images/about-banner.png" width="509" height="459" loading="lazy" alt="Burger with Drinks"
                        class="w-100 about-img">
                    <img src="images/sale-shape-red.png" width="216" height="226" alt="get up to 50% off now"
                        class="abs-img scale-up-anim">
                </div>
                <div class="about-content">
                    <h2 class="h2 section-title">
                        Caferio, Burgers, and Best Pizzas
                        <span class="span">in Town!</span>
                    </h2>
                    <p class="section-text">
                        The restaurants in Hangzhou also catered to many northern Chinese who had fled south from Kaifeng during
                        the Jurchen
                        invasion of the 1120s, while it is also known that many restaurants were run by families.
                    </p>
                    <ul class="about-list">
                        <li class="about-item">
                            <i class="fa-solid fa-check"></i>
                            <span class="span">Delicious & Healthy Foods</span>
                        </li>
                        <li class="about-item">
                            <i class="fa-solid fa-check"></i>
                            <span class="span">Spacific Family And Kids Zone</span>
                        </li>
                        <li class="about-item">
                            <i class="fa-solid fa-check"></i>
                            <span class="span">Music & Other Facilities</span>
                        </li>
                        <li class="about-item">
                            <i class="fa-solid fa-check"></i>
                            <span class="span">Fastest Food Home Delivery</span>
                        </li>
                    </ul>
                </div>
            </div>
        </article>
        <article class='delivery'>
            <div class="container">
                <div class="delivery-content">
                    <h2 class="h2 section-title">
                        A Moments Of Delivered On <span class="span">Right Time</span> & Place
                    </h2>
                    <p class="section-text">
                        The restaurants in Hangzhou also catered to many northern Chinese who had fled south from Kaifeng during
                        the Jurchen
                        invasion of the 1120s, while it is also known that many restaurants were run by families.
                    </p>
                </div>
                <figure class="delivery-banner">
                    <img src="/images/delivery-banner-bg.png" width="700" height="602" loading="lazy" alt="clouds"
                        class="w-100">
                    <img src="/images/delivery-boy.svg" width="1000" height="880" loading="lazy" alt="delivery boy"
                        class="w-100 delivery-img" data-delivery-boy>
                </figure>

            </div>
        </article>
        <article class="app" id="contact">
            <div class="image">
                <img src="./images/phones.png" alt="" />
            </div>
            <div class="content">
                <h3>Place your order through our app</h3>
                <p>
                You can easily place your order using our mobile app. Now you can
                download our app for both IOS and Android mobiles.
                </p>
                <div class="links">
                    <img src="./images/app-store.png" alt="" />
                    <img src="./images/google-play.png" alt="" />
                </div>
            </div>
        </article>
	</section> 
    <section class="ftco-section testimony-section">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center mb-3 pb-2">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <span class="subheading">Testimony</span>
                    <h2 class="mb-4">Happy Customer</h2>
                </div>
            </div>
            <div class="row ftco-animate justify-content-center">
                <div class="col-md-7">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap text-center">
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts.</p>
                                    <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="fa fa-quote-left"></i>
                                        </span>
                                    </div>
                                    <p class="name">John Gustavo</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center">
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts.</p>
                                    <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="fa fa-quote-left"></i>
                                        </span>
                                    </div>
                                    <p class="name">John Gustavo</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection()