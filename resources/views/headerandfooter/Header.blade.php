@section('navbar')
<nav class="navbar navbar-light" data-header>
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{ url('/image/logo.png') }}" alt="logo"> 
        </a>
        @if(isset($Person))
            <div class="profile-menu">
                <div class="action">
                    <img src="/ImageUsers/{{$Person->Photo}}" icon_data='{{$Person->id_people}}' />
                </div>
                <div class="menu">
                    <div class="profile">
                        <img src="/ImageUsers/{{$Person->Photo}}" />
                        <div class="info">
                            <h2>{{$Person->UserName }}</h2>
                            <p>{{$Person->Email}}</p>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <img src="/image/edit.png" />
                            <a href="#">Edit profile</a>
                        </li>
                        <li>
                            <img src="/image/setting.png" />
                            <a href="#">App setting</a>
                        </li>
                        <li>
                            <img src="/image/user.png" />
                            <a href="#">Account</a>
                        </li>
                        <li>
                            <img src="/image/help.png" />
                            <a href="#">Help</a>
                        </li>
                        <li>
                            <img src="/image/logout.png" />
                            <a href='/signOut'>Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        @else 
            <div class="d-flex align-items-center justify-content-end cartbtn">
                <button class="btn get-start" type="submit">Get started</button>
            </div>
        @endif
    </div>
</nav>
@endsection

@section('sign')
<div  class='sign'>
    <!-- start sign in  -->
    <div class="center in">
        <i class="fa-solid fa-xmark"></i>
        <h1 class="tille">Log in to</h1>
 
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
<a class="back-top-btn" aria-label="Back to top" data-back-top-btn>
    <i class="fa-solid fa-chevron-up"></i>
</a>
@endsection


