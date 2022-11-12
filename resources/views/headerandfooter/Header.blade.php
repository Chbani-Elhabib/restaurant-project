@section('navbar')
<nav class="navbar navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand">
            <img src="{{ url('image/logo.png') }}" alt="logo"> 
        </a>
        <button class="btn get-start" type="submit">Get started</button>
    </div>
</nav>
@endsection

@section('sign')
<div class='sign'>
    <div class="center">
        <i class="fa-solid fa-xmark"></i>
        <h1 class="tille">Log in to</h1>
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <div class="div-or">
            <span class="or"></span>
            <h1>or</h1>
            <span class="or"></span>
        </div>
        <form method="post">
            <div class="txt_field">
                <i class="fa-solid fa-user"></i>
                <input class="input-sign" type="text" required>
                <label class="label-sign">Username</label>
                <span></span>
            </div>
            <div class="txt_field">
                <i class="fa-solid fa-lock"></i>
                <input class="input-sign" type="password" required>
                <label class="label-sign">Password</label>
                <span></span>
                <img class="eye" src="image/close_eye.png" alt="eye">
            </div>
            <div class="pass">Forgot your password?</div>
            <input type="submit" value="Login" class="submit">
            <div class="signup_link">Not your member?<a href="#">Sign Up</a></div>
      </form>
    </div>
</div>

@endsection
