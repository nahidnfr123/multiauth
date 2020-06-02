<header>
    <div class="header-level-1">
        <div class="logo-box">
            <img id="flyshop-logo-image" src="" data-src="{{ asset('storage/_website_images/logo/logo.png') }}"
                 height="50" alt="FlyShop">
        </div>
        <nav>
            <ul>
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/') }}">Home</a>
                            <i><a href="{{ url('/profile') }}">profile</a></i>
                            <i>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </i>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    </div>
                @endif
                <li><a href="">Cart</a></li>
            </ul>
        </nav>
    </div>
    <div class="header-level-2">
        <div class="">
            <nav>
                <ul>
                    <li><a href="">Category list</a></li>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
            </nav>
        </div>
    </div>

</header>

