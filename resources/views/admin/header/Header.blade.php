@section('header')
<header>
    <div class="icon__menu">
        <i class="fa-solid fa-bars" id="btn_open"></i>
    </div>
    <div class="group-icon">
        <div class="dark-moud dark groop">
            <a href="#" class="nav-link">
                <i class="dark_icon fa-regular fa-moon"></i>
            </a>
            <div></div>
        </div>
        <div class="translate groop">
            <a  class="nav-link">
                <img class='fla'  src="{{ url('image/us.png') }}" alt="flag">
            </a>
            <div class='flag'>
                <div class='lagn'>
                    <a href="{{ url('languageConverter/en') }}">
                        <img src="{{ url('image/us.png') }}" alt="flag">
                        <p>{{ __('menu.English') }}</p>
                    </a>
                </div>
                <div class='lagn'>
                    <a href="{{ url('languageConverter/ar') }}">
                        <img src="{{ url('image/moroco.png') }}" alt="flag">
                        <p>{{ __('menu.Arabic') }}</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="notevication groop">
            <a class="nav-link">
                <i class="fa-regular fa-bell"></i>
            </a>
            <div class='notevica'></div>
        </div>
        <div class="message groop">
            <a class="nav-link">
                <i class="fa-solid fa-message"></i>
            </a>
            <div class='mess'></div>
        </div>
        <div class="profile groop">
            <div class="icon_wrap">
                <img src="{{ url('image/profile.png') }}" alt="profile">
            </div>
            <div class="profile_dd">
                <div class="profile_no">
                    <div class="profile_img">
                        <img src="{{ url('image/profile.png') }}" alt="profile">
                    </div>
                    <div class="profile_gg">
                        <h3>admin</h3>
                        <p>chbani@gmail.com</p>
                    </div>
                </div>
                <span></span>
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