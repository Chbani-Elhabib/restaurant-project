@section('navbar')
<nav class="navbar navbar-light" data-header>
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{ url('/image/logo.png') }}" alt="logo"> 
        </a>
        <div class="d-flex align-items-center justify-content-end cartbtn">
            <button class="btn get-start" type="submit">Get started</button>
        </div>
    </div>
</nav>
@endsection

@section('sign')
<div  class='sign'>
    <!-- start sign in  -->
    <div class="center in">
        <i class="fa-solid fa-xmark"></i>
        <h1 class="tille">Log in to</h1>
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <div class="div-or">
            <span class="or"></span>
            <h1>or</h1>
            <span class="or"></span>
        </div>
        <form method="post" action="{{ url('sign') }}">
            @csrf
            <div class="txt_field">
                <i class="fa-solid fa-user"></i>
                <input class="input-sign" name="UserName" type="text" required>
                <label class="label-sign">Username</label>
                <span class="span"></span>
            </div>
            <div class="txt_field">
                <i class="fa-solid fa-lock"></i>
                <input class="input-sign" name="Password" type="password" required>
                <label class="label-sign">Password</label>
                <span class="span"></span>
                <img class="eye" src="/image/close_eye.png" alt="eye">
            </div>
            <div class="pass">Forgot your password?</div>
            <input type="submit" value="Login" class="submit">
            <div class="signup_link">Not your member?<a>Sign Up</a></div>
        </form>
    </div>
    <!-- end sign in  -->
    <!-- start sign up  -->
    <div class="center up">
        <i class="fa-solid fa-xmark"></i>
        <h1 class="tille tille-up">Log up to</h1>
        <div class="g-signin2 google" data-onsuccess="onSignIn"></div>
        <div class="div-or or">
            <span class="or"></span>
            <h1>or</h1>
            <span class="or"></span>
        </div>
        <form method="post" action="{{ url('login') }}">
            @csrf
            <div class="txt_field">
                <input class="input-sign" name="UserName" type="text" required>
                <label class="label-sign">UserName</label>
                <span class="span"></span>
            </div>
            <div class="txt_field">
                <input class="input-sign"  name="Email" type="text" required>
                <label class="label-sign">Email</label>
                <span class="span"></span>
            </div>
            <div class="txt_field">
                <input class="input-sign"  name="Password" type="password" required>
                <label class="label-sign">Password</label>
                <span class="span"></span>
                <img class="eye" src="/image/close_eye.png" alt="eye">
            </div>
            <div class="txt_field">
                <input class="input-sign" type="password" required>
                <label class="label-sign">Confirm Password</label>
                <span class="span"></span>
            </div>
            <input type="submit" value="logup" class="submit">
            <div class="signup_link link-in">Not your member?<a>Sign In</a></div>
        </form>
    </div>
    <!-- end sign up  -->
</div>
<!--  - #BACK TO TOP  -->
<a href="#top" class="back-top-btn" aria-label="Back to top" data-back-top-btn>
    <i class="fa-solid fa-chevron-up"></i>
</a>
@endsection


