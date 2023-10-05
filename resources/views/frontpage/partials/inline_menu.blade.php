

<nav class="navbar navbar-expand-lg- header-nav">
    <div class="navbar-header">
        <a href="/" class="navbar-brand logo">
            <img style="height: 30px" src="{{ settings('front_logo',asset('default/ani_logo.png')) }}" class="img-fluid" alt="Logo">
        </a>
    </div>

    @if(count(menus('frontpage-top-menu')) > 0)
        <ul class="nav header-navbar-rht">
            @foreach(menus('frontpage-top-menu') as $menu)
                @if(isset($menu['label']) && isset($menu['url']))
                <li class="nav-item head-menu">
                    <a class="nav-link header-login" href="{{ $menu['url'] }}"><span><i class="{{ isset($menu['icon']) ? $menu['icon'] : '' }} mx-2"></i></span>{{ $menu['label'] }}</a>
                </li>
                @elseif(isset($menu['label']))
                    @if($menu['label'] == 'lang')
                        <li class="nav-item head-menu">
                            <img class="nav-link-img" src="/default/lang.png" style="height: 20px" />
                        </li>
                    @endif
                        @if($menu['label'] == 'currency')
                            <li class="nav-item head-menu">
                                <a class="nav-link header-login" href="#">EUR</a>
                            </li>
                        @endif
                @endif
                    @endforeach
                </ul>
            @else
                <p>No menus found.</p>
            @endif
</nav>
<hr />
