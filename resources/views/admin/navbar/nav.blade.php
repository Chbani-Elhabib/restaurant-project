@section('nav')
<div class="menu__side" id="menu_side">

    <div class="name__page">
        <i class="fa-solid fa-r"></i>
        <img src="{{ url('image/logoe.png') }}" alt="logo" class="logo_RR">
    </div>

    <div class="options__menu">	

        @if( $Person->User_Group == 'Admin' )
            <a href="{{ url('admin') }}" class="selected @yield('Dashboard')">
        @elseif( $Person->User_Group == 'Manager' )
            <a href="{{ url('manager') }}" class="selected @yield('Dashboard')">
        @elseif( $Person->User_Group == 'Chef' )
            <a href="{{ url('chef') }}" class="selected @yield('Dashboard')">
        @else
            <a href="{{ url('liverour') }}" class="selected @yield('Dashboard')">
        @endif
            <span class="shape1"></span>
            <span class="shape2"></span>
            <div class="option">
                <i class="fa-solid fa-gauge" title="Dashboard"></i>
                <h4>{{ __('nav.Dashboard') }}</h4>
            </div>
        </a>

        @if( $Person->User_Group == 'Admin' || $Person->User_Group == 'Manager' )
            @if( $Person->User_Group == 'Admin' )
                <a href="{{ url('admin/users') }}" class="@yield('Users')">
            @else
                <a href="{{ url('manager/users') }}" class="@yield('Users')">
            @endif
                <span class="shape1"></span>
                <span class="shape2"></span>
                <div class="option">
                    <i class="fa-solid fa-users" title="Users"></i>
                    <h4 style="margin-left: 15px;" >{{ __('nav.Users') }}</h4>
                </div>
            </a>
        @endif

        @if( $Person->User_Group == 'Admin' )
            <a href="{{ url('admin/restaurants') }}" class="@yield('Restaurants')">
        @elseif( $Person->User_Group == 'Manager' )
            <a href="{{ url('manager/restaurants') }}" class="@yield('Restaurants')">
        @elseif( $Person->User_Group == 'Chef' )
            <a href="{{ url('chef/restaurants') }}" class="@yield('Restaurants')">
        @else
            <a href="{{ url('liverour/restaurants') }}" class="@yield('Restaurants')">
        @endif
            <span class="shape1"></span>
            <span class="shape2"></span>
            <div class="option">
                <i class="fa-solid fa-layer-group" title="Restaurants"></i>
                <h4 style="margin-left: 23px;">{{ __('nav.Restaurants') }}</h4>
            </div>
        </a>

        @if( $Person->User_Group != 'Liverour')
            @if( $Person->User_Group == 'Admin' )
                <a href="{{ url('admin/meals') }}" class="@yield('Meals')">
            @elseif( $Person->User_Group == 'Manager' )
                <a href="{{ url('manager/meals') }}" class="@yield('Meals')">
            @else
                <a href="{{ url('chef/meals') }}" class="@yield('Meals')">
            @endif
                <span class="shape1"></span>
                <span class="shape2"></span>
                <div class="option">
                    <i class="fa-solid fa-wine-glass" title="meals"></i>
                    <h4 style="margin-left: 28px;">{{ __('nav.Meals') }}</h4>
                </div>
            </a>
        @endif

        @if( $Person->User_Group == 'Admin' )
            <a href="{{ url('admin/order') }}" class="@yield('Booking')">
        @elseif( $Person->User_Group == 'Manager' )
            <a href="{{ url('manager/order') }}" class="@yield('Booking')">
        @elseif( $Person->User_Group == 'Chef' )
            <a href="{{ url('chef/order') }}" class="@yield('Booking')">
        @else
            <a href="{{ url('liverour/order') }}" class="@yield('Booking')">
        @endif
            <span class="shape1"></span>
            <span class="shape2"></span>
            <div class="option">
                <i class="fa-solid fa-bookmark" title="Booking"></i>
                <h4 style="margin-left: 34px;">{{ __('nav.Booking') }}</h4>
            </div>
        </a>

        @if( $Person->User_Group != 'Chef' )
            @if( $Person->User_Group == 'Admin' )
                <a href="{{ url('admin/contacts') }}" class="@yield('Contacts')">
            @elseif( $Person->User_Group == 'Manager' )
                <a href="{{ url('manager/contacts') }}" class="@yield('Contacts')">
            @else
                <a href="{{ url('liverour/contacts') }}" class="@yield('Contacts')">
            @endif
                <span class="shape1"></span>
                <span class="shape2"></span>
                <div class="option">
                    <i class="fa-solid fa-comments" title="Contacto"></i>
                    <h4 style="margin-left: 26px;">{{ __('nav.Contacts') }}</h4>
                </div>
            </a>
        @endif

        @if( $Person->User_Group == 'Admin' )

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
        @endif
    </div>

</div>
@endsection