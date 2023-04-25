@section('header')
<header>

    <div class="icon__menu">
        <i class="fa-solid fa-bars" id="btn_open"></i>
    </div>

    <div class="group-icon">

        <div class="dark-moud dark groop">
            <a class="nav-link">
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

        @if($Person['User_Group']  != 'Chef')
            <div class="message">
                <a class="nav-link">
                    <i class="fa-solid fa-message"></i>
                </a>
            </div>
        @endif

        <div class="profile groop">

            <a class="nav-link">
                <div class="icon_wrap">
                    <img src="{{ url('ImageUsers/Users.png') }}" alt="profile">
                </div>
            </a>

            <div class="profile_dd">

                <div class="profile_no">
                    <div class="profile_img">
                        <img src="{{ url('ImageUsers/Users.png') }}" alt="profile">
                    </div>
                    <div class="profile_gg">
                        <h3>{{ $Person['UserName'] }}</h3>
                        <p>{{ $Person['Email'] }}</p>
                    </div>
                </div>
                <span></span>

                @if($Person['User_Group']  == 'Admin')
                    <a class="address" href="{{ url('/admin/profile') }}">
                @elseif($Person['User_Group']  == 'Manager')
                    <a class="address" href="{{ url('/manager/profile') }}">
                @elseif($Person['User_Group']  == 'Chef')
                    <a class="address" href="{{ url('/chef/profile') }}">
                @else
                    <a class="address" href="{{ url('/liverour/profile') }}">
                @endif
                    <i class="fa-regular fa-user"></i>
                        My Profile 
                    </a>

                @if($Person['User_Group']  == 'Admin')
                    <a class="settings" href="{{ url('/admin/Update') }}">
                @elseif($Person['User_Group']  == 'Manager')
                    <a class="address" href="{{ url('/manager/Update') }}">
                @elseif($Person['User_Group']  == 'Chef')
                    <a class="address" href="{{ url('/chef/Update') }}">
                @else
                    <a class="address" href="{{ url('/liverour/Update') }}">
                @endif
                    <i class="fas fa-cog"></i>
                        Update profile
                    </a>

                @if($Person['User_Group']  != 'Admin')
                    @if($Person['User_Group']  == 'Manager')
                        <a class="address" href="{{ url('/manager/Updatepassword') }}">
                    @elseif($Person['User_Group']  == 'Chef')
                        <a class="address" href="{{ url('/chef/Updatepassword') }}">
                    @else
                        <a class="address" href="{{ url('/liverour/Updatepassword') }}">
                    @endif
                        <i class="fa-solid fa-key"></i>
                            Update password
                        </a>
                @endif

                @if($Person['User_Group']  == 'Admin')
                    <a class="logout" href="{{ url('/admin/signOut') }}">
                @elseif($Person['User_Group']  == 'Manager')
                    <a class="address" href="{{ url('/manager/signOut') }}">
                @elseif($Person['User_Group']  == 'Chef')
                    <a class="address" href="{{ url('/chef/signOut') }}">
                @else
                    <a class="address" href="{{ url('/liverour/signOut') }}">
                @endif
                    <i class="fa-solid fa-power-off"></i>
                        Sign Out 
                    </a>

            </div>

        </div>
    </div>
</header>


<section>
    <div class='mess'>
        <div class='title-message'>
            <h2>Chats</h2>
            <div>
                <input type="text" class="form-control" >
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
        <div>

        </div>
    </div>
</section>


<section><div class="card"></div></section>


@endsection