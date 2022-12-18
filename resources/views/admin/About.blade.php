@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','About')
@section('About','active')
<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/Aboot.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/Aboot.js'])
@endsection


@section('content')
<section class="menu-content">
    <div class="button_19">
        <h2 class="menu_aboot">About Us</h2>
    </div>
    <div class="button_19">
        <h2 class="menu_FAQ">FAQ</h2>
    </div>
    <div class="button_19">
        <h2 class="menu_meals">The best meals</h2>
    </div>
</section>
<section class="cont-content">
    <div class="cont">
        <article class="about">
            about us
        </article>
        <article class="FAQ">
            <div class='add_FAQ'>
                <button>add FAQ</button>
            </div>
            <div>
                <form action="">
                    <div class='form_FAQ'>
                        <div>
                            <label for="">title FAQ English</label>
                            <input type="text">
                        </div>
                        <div>
                            <label for="">title FAQ Arabic</label>
                            <input type="text">
                        </div>
                        <div>
                            <label for="">body FAQ English</label>
                            <textarea name="message" >The cat was playing in the garden.</textarea>
                        </div>
                        <div>
                            <label for="">body FAQ Arabic</label>
                            <textarea name="message" rows="10" cols="30">The cat was playing in the garden.</textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="questions-container">
                <div class="question">
                    <button class="btn_FAQ">
                        <span>What's the best way to study JavaScript?</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>Start With An Online Course.An online tutorial is probably the best way to learn JavaScript.If you're serious about learning fast, efficiently and without missing any important information, then you should consider enrolling in an online course.</p>
                </div>
                <div class="question">
                    <button class="btn_FAQ">
                        <span>What should I learn after JavaScript / js?</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>I suggest taking a look at Typescript and learning some popular frontend framework (Angular, React, Vue). If you are interested in backend, take a look at Node. js.</p>
                </div>
                <div class="question">
                    <button class="btn_FAQ">
                        <span>Can I get a job after learning JavaScript?</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi laboriosam ea odit voluptate culpa quas explicabo.</p>
                </div>
                <div class="question">
                    <button class="btn_FAQ">
                        <span>How long will it take to learn JavaScript?</span>
                        <i class="fas fa-chevron-down d-arrow"></i>
                    </button>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus corporis pariatur a maiores minus tempore magni nam beatae dolores omnis.</p>
                </div>
            </div>
        </article>
        <article class="meals">
            <div class="border_meals">
                <div class="btn_add">
                    <i class="fa-solid fa-plus"></i>
                    <button type="button" class="button_19">add meal</button>
                </div>
                <div class="add_meals">
                    <form action="{{ url('admin/about/createmeal') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="title_English">title en English</label>
                            <input name="title_English" id="title_English" type="text">
                        </div>
                        <div>
                            <label for="title_Arabic">title en Arabic</label>
                            <input name="title_Arabic" id="title_Arabic" dir="rtl" lang="ar" type="text">
                        </div>
                        <div class='js_image'></div>
                        <div>
                            <input type="file" name="image_meal" id='image_1'  hidden>
                            <label for="image_1">image meal</label>
                        </div>
                        <div>
                            <button type="submit" class="button_19 add_meal_form">add meal</button>
                        </div>
                    </form>
                </div>
                <div id="tranding">
                    <div class="container">
                        <div class="swiper tranding-slider">
                            <div class="swiper-wrapper">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>
@endsection