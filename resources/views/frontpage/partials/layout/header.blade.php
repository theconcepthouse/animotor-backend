
@if(!is_app())

    @if(settings('header_style') == 'default')
        <header class="header-section">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo-menu">
                        <a href="#" class="logo">
                            <img src="assets/img/logo/logo.png" alt="logo">
                        </a>
                        <a href="#" class="small__logo d-xl-none">
                            <img src="assets/img/logo/favicon.png" alt="logo">
                        </a>
                    </div>
                    <div class="menu__right__components d-flex align-items-center">
                        <div class="sigup__grp d-lg-none">
                            <a href="#" class="cmn__btn outline__btn">
                     <span>
                        Signin
                     </span>
                            </a>
                            <a href="#" class="cmn__btn">
                     <span>
                        Signup
                     </span>
                            </a>
                        </div>
                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <ul class="main-menu">
                        <li class="grid__style">
                            <a href="/" class="d-flex">
                     <span>
                        Home
                     </span>
                            </a>
                        </li>
                        <li class="grid__style">
                            <a href="/flight" class="d-flex">
                     <span>
                        Flight
                     </span>
                            </a>
                        </li>

                        <li class="sigup__grp d-lg-none d-flex align-items-center">
                            <a href="#" class="cmn__btn outline__btn">
                     <span>
                        Signin
                     </span>
                            </a>
                            <a href="#" class="cmn__btn">
                     <span>
                        Signup
                     </span>
                            </a>
                        </li>
                    </ul>
                    <div class="sigin__grp d-flex align-items-center">
                        <a href="#" class="cmn__btn outline__btn">
                  <span>
                     Signin
                  </span>
                        </a>
                        <a href="#" class="cmn__btn">
                  <span>
                     Signup
                  </span>
                        </a>
                    </div>
                </div>
            </div>
        </header>
    @else
        <header class="header-section header_simple">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo-menu">
                        <a href="/" class="logo">
                            <img src="{{ settings('front_logo') }}" alt="logo">
                        </a>
                        <a href="/" class="small__logo d-xl-none">
                            <img src="{{ settings('front_sm_logo') }}" alt="logo">
                        </a>
                    </div>
                    <div class="menu__right__components d-flex align-items-center">
                        <div class="sigup__grp d-lg-none">
                            @guest()
                                <a href="{{ route('login') }}" class="cmn__btn outline__btn">
                     <span>
                        Signin
                     </span>
                                </a>
                            @else
                                <a href="{{ route('dashboard') }}" class="cmn__btn outline__btn">
                     <span>
                        Dashboard
                     </span>
                                </a>
                            @endguest
                            {{--                        <a href="#" class="cmn__btn">--}}
                            {{--                     <span>--}}
                            {{--                        Signup--}}
                            {{--                     </span>--}}
                            {{--                        </a>--}}
                        </div>
                        {{--                    <div class="header-bar d-lg-none">--}}
                        {{--                        <span></span>--}}
                        {{--                        <span></span>--}}
                        {{--                        <span></span>--}}
                        {{--                    </div>--}}
                    </div>

                    @if(is_array(menuItems()))
                        <div class="sigin__grp d-flex align-items-center">
                            @foreach(menuItems() as $item)
                                <a href="{{ isset($item['url']) ? $item['url'] : "#" }}" class="">
                                    @if(isset($item['img']))
                                        <img src="{{ $item['img'] }}">
                                    @endif
                                    @if(isset($item['title']))
                                        <span>{{ $item['title'] }}</span>
                                    @endif
                                </a>
                            @endforeach

                            @guest()
                                <a href="/login" class="">
                                    <img src="/assets/img/icons/login.png">
                                    <span> Login / Register</span>
                                </a>
                            @else
                                <a href="{{ route('dashboard') }}" class="">
                                    <span> Dashboard</span>
                                </a>

                                </a>
                                <a href="{{ route('logout') }}" class="btn_danger"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <img src="/assets/img/icons/login.png">
                                    <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            @endguest


                        </div>
                    @endif
                </div>
            </div>
        </header>
    @endif

@endif

