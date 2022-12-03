@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','About')
@section('About','active')



@section('content')
<section class="menu-content">
    <div>
        <h2 class="menu_aboot">About Us</h2>
    </div>
    <div>
        <h2 class="menu_FAQ">FAQ</h2>
    </div>
    <div>
        <h2 class="menu_meals">The best meals</h2>
    </div>
</section>
<section class="cont-content">
    <div class="cont">
        <article class="about">
            about us
        </article>
        <article class="FAQ">
            FAQ
        </article>
        <article class="meals">
            <div class="btn_add">
                <i class="fa-solid fa-plus"></i>
                <button type="button" class="btn btn-success">add The best meal</button>
            </div>
            <div class="add_meals">
                <form action="">
                    <input type="text">
                    <input type="text">
                    <input type="file" name="meal" accept="image/png, image/jpeg">
                    <button type="button" class="btn btn-success">add The best meal</button>
                </form>
            </div>
            <div id="tranding">
                <div class="container">
                    <div class="swiper tranding-slider">
                        <div class="swiper-wrapper">
                            <!-- Slide-start -->
                            <div class="swiper-slide tranding-slide">
                                <div class="tranding-slide-img">
                                    <img src="{{ url('images/tranding-food-1.png') }}" alt="Tranding">
                                </div>
                                <div class="tranding-slide-content">
                                    <div class="tranding-slide-content-bottom">
                                        <h2 class="food-name">Special Pizza</h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Slide-end -->
                            <!-- Slide-start -->
                            <div class="swiper-slide tranding-slide">
                                <div class="tranding-slide-img">
                                    <img src="{{ url('images/tranding-food-2.png') }}" alt="Tranding">
                                </div>
                                <div class="tranding-slide-content">
                                    <div class="tranding-slide-content-bottom">
                                        <h2 class="food-name">Meat Ball</h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Slide-end -->
                            <!-- Slide-start -->
                            <div class="swiper-slide tranding-slide">
                                <div class="tranding-slide-img">
                                    <img src="{{ url('images/tranding-food-3.png') }}" alt="Tranding">
                                </div>
                                <div class="tranding-slide-content">
                                    <div class="tranding-slide-content-bottom">
                                        <h2 class="food-name">Burger</h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Slide-end -->
                            <!-- Slide-start -->
                            <div class="swiper-slide tranding-slide">
                                <div class="tranding-slide-img">
                                    <img src="{{ url('images/tranding-food-4.png') }}" alt="Tranding">
                                </div>
                                <div class="tranding-slide-content">
                                    <div class="tranding-slide-content-bottom">
                                        <h2 class="food-name">Frish Curry</h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Slide-end -->
                            <!-- Slide-start -->
                            <div class="swiper-slide tranding-slide">
                                <div class="tranding-slide-img">
                                    <img src="{{ url('images/tranding-food-5.png') }}" alt="Tranding">
                                </div>
                                <div class="tranding-slide-content">
                                    <div class="tranding-slide-content-bottom">
                                        <h2 class="food-name">Pane Cake</h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Slide-end -->
                            <!-- Slide-start -->
                            <div class="swiper-slide tranding-slide">
                                <div class="tranding-slide-img">
                                    <img src="{{ url('images/tranding-food-6.png') }}" alt="Tranding">
                                </div>
                                <div class="tranding-slide-content">
                                    <div class="tranding-slide-content-bottom">
                                        <h2 class="food-name">Vanilla cake</h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Slide-end -->
                            <!-- Slide-start -->
                            <div class="swiper-slide tranding-slide">
                                <div class="tranding-slide-img">
                                    <img src="{{ url('images/tranding-food-7.png') }}" alt="Tranding">
                                </div>
                                <div class="tranding-slide-content">
                                    <div class="tranding-slide-content-bottom">
                                        <h2 class="food-name">Straw Cake</h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Slide-end -->
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>
@endsection()