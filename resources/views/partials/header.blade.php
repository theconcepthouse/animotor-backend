<header class="header-section header__twostyle">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo-menu">
                <a href="#" class="logo">
                    <img style="max-height: 60px" src="{{ settings('light_logo') }}" alt="logo">
                </a>
                <a href="#" class="small__logo d-xl-none">
                    <img src="{{ settings('favicon') }}" alt="logo">
                </a>
            </div>
            <div class="menu__right__components d-flex align-items-center">
                <div class="sigup__grp d-lg-none">
                </div>
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <ul class="main-menu">
                <li class="grid__style">
                    <a href="/#" class="d-flex">
                     <span>
                        Home
                     </span>
                    </a>
                </li>
                <li class="grid__style">
                    <a href="/#about" class="d-flex">
                     <span>
                        About
                     </span>
                    </a>
                </li>
                <li class="grid__style">
                    <a href="/#services" class="d-flex">
                     <span>
                        Services
                     </span>
                    </a>
                </li>
                <li class="grid__style">
                    <a href="/#contact" class="d-flex">
                     <span>
                        Contact us
                     </span>
                    </a>
                </li>
                <li class="grid__style">
                    <a href="/#app" class="d-flex">
                     <span>
                        Download app
                     </span>
                    </a>
                </li>

                @guest()
                <li class="sigup__grp d-lg-none d-flex align-items-center">
                    <a href="{{ route('login') }}" class="cmn__btn outline__btn">
                     <span>
                        Signin
                     </span>
                    </a>
                    <a href="{{ route('register') }}" class="cmn__btn">
                     <span>
                        Signup
                     </span>
                    </a>
                </li>
                @else
                    <li class="sigup__grp d-lg-none d-flex align-items-center">
                        <a href="{{ route('register') }}" class="cmn__btn">
                     <span>
                        Dashboard
                     </span>
                        </a>
                    </li>
                @endif
            </ul>
            <div class="sigin__grp d-flex align-items-center">
                @guest()
                <a href="{{ route('login') }}" class="cmn__btn outline__btn">
                  <span>
                     Signin
                  </span>
                </a>
                <a href="{{ route('register') }}" class="cmn__btn">
                  <span>
                     Signup
                  </span>
                </a>
                @else
                    <a href="{{ route('dashboard') }}" class="cmn__btn">
                  <span>
                     Dashboard
                  </span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</header>
