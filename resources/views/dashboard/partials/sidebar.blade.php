<div class="col-md-3">
    <div class="personal__infotabs">
        <ul class="nav">
            <li class="nav-item">
                <a  wire:navigate href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? ' active' : '' }}">
                     <span class="icon">
                        <img src="/assets/img/svg/log.svg" alt="login">
                     </span>
                    <span>
                        Dashboard
                     </span>
                </a>
            </li>
            <li class="nav-item">
                <a  wire:navigate href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile') ? ' active' : '' }}">
                     <span class="icon">
                        <img src="/assets/img/svg/log.svg" alt="login">
                     </span>
                    <span>
                        Personal Information
                     </span>
                </a>
            </li>

            @if(hasRental())
            <li class="nav-item">
                <a  wire:navigate href="{{ route('bookings') }}" class="nav-link {{ request()->routeIs('bookings') ? ' active' : '' }}">
                     <span class="icon">
                        <img src="/assets/img/svg/log.svg" alt="login">
                     </span>
                    <span>
                        Bookings
                     </span>
                </a>
            </li>
            @endif

{{--            <li class="nav-item">--}}
{{--                <a wire:navigate href="{{ route('top_up') }}" class="nav-link {{ request()->routeIs('top_up') ? ' active' : '' }}">--}}
{{--                     <span class="icon">--}}
{{--                        <img src="/assets/img/svg/creadits.svg" alt="login">--}}
{{--                     </span>--}}
{{--                    <span>--}}
{{--                        Account Topup--}}
{{--                     </span>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="nav-item">
                <a wire:navigate href="{{ route('transactions') }}" class="nav-link {{ request()->routeIs('transactions') ? ' active' : '' }}">
                        <span class="icon">
                           <img src="/assets/img/svg/file-transfer.svg" alt="login">
                        </span>
                    <span>
                           Transaction
                        </span>
                </a>
            </li>

            <li class="nav-item">
                <a wire:navigate href="{{ route('notifications') }}"  class="nav-link {{ request()->routeIs('notifications') ? ' active' : '' }}">
                        <span class="icon">
                           <img src="/assets/img/svg/notifications.svg" alt="login">
                        </span>
                    <span>
                           Notifications
                        </span>
                </a>
            </li>

            <li class="nav-item">
                <a wire:navigate href="/"  class="nav-link ">
                        <span class="icon">
                           <img src="/assets/img/svg/info-cancel.svg" alt="home">
                        </span>
                    <span>
                           Home
                        </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                    <span class="icon">
                           <img src="/assets/img/svg/info-cancel.svg" alt="login">
                        </span>
                    <span>
                           Logout
                        </span>
                </a>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
