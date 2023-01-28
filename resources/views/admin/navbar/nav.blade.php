@section('nav')
<div class="menu__side" id="menu_side">

    <div class="name__page">
        <i class="fa-solid fa-r"></i>
        <img src="{{ url('image/logoe.png') }}" alt="logo" class="logo_RR">
    </div>

    <div class="options__menu">	

        <a href="{{ url('admin') }}" class="selected @yield('Dashboard')">
            <span class="shape1"></span>
            <span class="shape2"></span>
            <div class="option">
                <i class="fa-solid fa-gauge" title="Dashboard"></i>
                <h4>{{ __('nav.Dashboard') }}</h4>
            </div>
        </a>

        <a href="{{ url('admin/users') }}" class="@yield('Users')">
            <span class="shape1"></span>
            <span class="shape2"></span>
            <div class="option">
                <i class="fa-solid fa-users" title="Users"></i>
                <h4 style="margin-left: 15px;" >{{ __('nav.Users') }}</h4>
            </div>
        </a>
        
        <a href="{{ url('admin/restaurants') }}" class="@yield('Restaurants')">
            <span class="shape1"></span>
            <span class="shape2"></span>
            <div class="option">
                <i class="fa-solid fa-layer-group" title="Restaurants"></i>
                <h4 style="margin-left: 23px;">{{ __('nav.Restaurants') }}</h4>
            </div>
        </a>

        <a href="{{ url('admin/meals') }}" class="@yield('Meals')">
            <span class="shape1"></span>
            <span class="shape2"></span>
            <div class="option">
                <i class="fa-solid fa-wine-glass" title="meals"></i>
                <h4 style="margin-left: 28px;">{{ __('nav.Meals') }}</h4>
            </div>
        </a>

        <a href="{{ url('admin/booking') }}" class="@yield('Booking')">
            <span class="shape1"></span>
            <span class="shape2"></span>
            <div class="option">
                <i class="fa-solid fa-bookmark" title="Booking"></i>
                <h4 style="margin-left: 34px;">{{ __('nav.Booking') }}</h4>
            </div>
        </a>

        <a href="{{ url('admin/contacts') }}" class="@yield('Contacts')">
            <span class="shape1"></span>
            <span class="shape2"></span>
            <div class="option">
                <i class="fa-solid fa-comments" title="Contacto"></i>
                <h4 style="margin-left: 26px;">{{ __('nav.Contacts') }}</h4>
            </div>
        </a>

        <a href="{{ url('admin/about') }}" class="@yield('About')">
            <span class="shape1"></span>
            <span class="shape2"></span>
            <div class="option">
                <i class="far fa-address-card" title="About Us"></i>
                <h4>{{ __('nav.About Us') }}</h4>
            </div>
        </a>

        <a href="{{ url('admin/faq') }}" class="@yield('FAQ')">
            <span class="shape1"></span>
            <span class="shape2"></span>
            <div class="option">
                <i class="fa-solid fa-question" title="FAQ"></i>
                <h4 style="margin-left: 31px;">{{ __('nav.FAQ') }}</h4>
            </div>
        </a>

    </div>

</div>
@endsection