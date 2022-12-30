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
@vite(['resources/css/FAQ.css'])
@endsection

@section('js')
@vite(['resources/js/FAQ.js'])
@endsection

@section('contant')
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
@endsection()