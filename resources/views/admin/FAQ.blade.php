@extends('admin.html.Html')
@extends('admin.header.Header')
@extends('admin.navbar.nav')
@section('title','FAQ')
@section('FAQ','active')

<!-- css  -->
@section('css')
@vite(['resources/css/admin/navbar/Nav.css','resources/css/admin/FAQ.css'])
@endsection
<!-- js  -->
@section('js')
@vite(['resources/js/admin/navbar/Nav.js','resources/js/admin/FAQ.js'])
@endsection

@section('content')
    <section class="faq">
        <div class="faqborder">
            <article class="FAQ">
                <div class='content_FAQ'>
                    <div class='add_FAQ'>
                        <button class="button_19 ShowAddFAQ">add FAQ English</button>
                    </div>
                    <div class='form_FAQ'>
                        <form action="{{ url('/FAQ/store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="title">title FAQ English</label>
                                <input id='title' name='title' type="text">
                                <p class='errorinput'></p>
                            </div>
                            <div>
                                <label for="body">body FAQ English</label>
                                <textarea id='body' name='body' ></textarea>
                                <p class='errortextarea'></p>
                            </div>
                            <input type="text" name="Language" value='English' style="display: none">
                            <div>
                                <button class="button_19 addfaq" >add</button>
                            </div>
                        </form>
                    </div>
                    <div class='add_FAQ_Arabic'>
                        <button class="button_19 ShowAddFAQ">add FAQ Arabic</button>
                    </div>
                    <div class='form_FAQ'>
                        <form action="{{ url('/FAQ/store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="titl">title FAQ Arabic</label>
                                <input id='titl' name='title' type="text">
                                <p class='errorinput'></p>
                            </div>
                            <div>
                                <label for="bodye">body FAQ Arabic</label>
                                <textarea id='bodye' name='body'></textarea>
                                <p class='errortextarea'></p>
                            </div>
                            <input type="text" name="Language" value='Arabic' style="display: none">
                            <div>
                                <button class="button_19 addfaq">add</button>
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
                </div>
            </article>
        </div>
    </section>
@endsection