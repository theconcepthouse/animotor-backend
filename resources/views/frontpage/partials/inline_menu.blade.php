@php
    $menus = json_decode(settings('frontpage_menu',[]), true);
@endphp

<nav class="navbar navbar-expand-lg- header-nav">
    <div class="navbar-header">
        <a href="/" class="navbar-brand logo">
            <img style="height: 30px" src="{{ settings('front_logo',asset('default/ani_logo.png')) }}" class="img-fluid" alt="Logo">
        </a>
    </div>

    @if(is_array($menus))
        <ul class="nav header-navbar-rht">
            @foreach($menus as $menu)
                @if(isset($menu['title']) && isset($menu['url']))
                <li class="nav-item head-menu">
                    <a class="nav-link header-login" href="{{ $menu['url'] }}"><span><i class="{{ isset($menu['icon']) ? $menu['icon'] : '' }} mx-2"></i></span>{{ $menu['title'] }}</a>
                </li>
                @elseif(isset($menu['title']))
                    @if($menu['title'] == 'lang')
                        <li class="nav-item head-menu">
                            <img class="nav-link-img" src="/default/lang.png" style="height: 20px" />
                        </li>
                    @endif
                        @if($menu['title'] == 'currency')
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
