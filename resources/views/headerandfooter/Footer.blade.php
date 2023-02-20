@section('footer')
<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-brand">
                <a href="#" class="logo">
                    <img src="/image/logo.png" alt="fasteat home">
                </a>
                <h1>The Best Restaurants in Your Home</h1>
                <p class="section-text">
                    Vitae congue mauris rhoncus aenean. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere.
                    Tempus egestas sed sed risus pretium quam.
                </p>
            </div>
            <ul class="footer-list">
                <li>
                    <p class="footer-list-title h5">Menu</p>
                </li>
                <li>
                    <a href="{{ url('/about') }}" class="footer-link">
                        <span class="span">About Us</span>
                        <i class="fa-solid fa-right-long"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/contacts') }}" class="footer-link">
                        <span class="span">Contacts</span>
                        <i class="fa-solid fa-right-long"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/FAQ') }}" class="footer-link">
                        <span class="span">FAQ</span>
                        <i class="fa-solid fa-right-long"></i>
                    </a>
                </li>
                <li>
                    <a class="footer-link lang">
                        <span class="span namelang">{{ __('public.lang') }}</span>
                        <i class="fa-solid fa-right-long"></i>
                    </a>
                </li>
            </ul>
            <ul class="footer-list">
                <li>
                    <p class="footer-list-title h5">Contacts</p>
                </li>
                <li>
                    <address class="address">
                        <i class="fa-solid fa-location-dot"></i>
                        <span class="span">1717 Harrison St, San Francisco, CA 94103, United States</span>
                    </address>
                </li>
                <li>
                    <a href="mailto:quickeat@mail.net" class="footer-link">
                        <i class="fa-solid fa-envelope"></i>
                        <span class="span">contact@restaurant.com</span>
                    </a>
                </li>
                <li>
                    <a href="tel:+12344567890" class="footer-link">
                        <i class="fa-solid fa-phone"></i>
                        <span class="span">+220 621 291 780</span>
                    </a>
                </li>
                <li>
                    <ul class="social-list">
                        <li>
                            <a href="#" class="social-link">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-link">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social-link">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p class="copyright">
                Copyright 2022 codewithsadee. All rights reserved.
            </p>
        </div>
    </div>
</footer>
@endsection