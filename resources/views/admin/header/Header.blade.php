@section('header')
<header>
    <div class="icon__menu">
        <i class="fa-solid fa-bars" id="btn_open"></i>
    </div>
    <div class="group-icon">
        <div class="dark-moud">
            <a href="#" class="nav-link">
                <i class="fa-regular fa-moon"></i>
            </a>
        </div>
        <div class="translate">
            <a href="#" class="nav-link">
                <img src="image/us.png" alt="flag">
            </a>
        </div>
        <div>
            <a href="" class="nav-link">
                <i class="fa-regular fa-bell"></i>
            </a>
        </div>
        <div class="message">
            <a href="" class="nav-link">
                <i class="fa-solid fa-message"></i>
            </a>
        </div>
        <div class="profile">
            <div class="icon_wrap">
                <img src="image/profile.png" alt="profile_pic">
            </div>
            <div class="profile_dd">
                <a class="address" href="#">
                    <i class="fa-regular fa-user"></i>
                    My Profile 
                </a>
                <a class="settings" href="#">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
                <a class="logout" href="#">
                    <i class="fa-solid fa-power-off"></i>
                    Sign Out 
                </a>
            </div>
        </div>
    </div>
</header>
@endsection