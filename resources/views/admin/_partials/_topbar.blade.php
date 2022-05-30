<div class="topbar">
    <div class="topbar-left">
        <a href="{{ route('dashboard.index') }}" class="logo">
            <span><img src="{{ asset('img/Fake_Taxi_logo.svg') }}" height="40"></span>
            <i>
                <img src="{{ asset('img/admin-logo-mark-white.png') }}" height="40">
            </i>
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="navbar-right d-flex list-inline float-right mb-0">
            <li class="dropdown notification-list">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('img/user-image.png') }}" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                        <a href="{{ route('settings.edit') }}" class="dropdown-item">
                            <i class="mdi mdi-account-circle m-r-5"></i>
                            Profil
                        </a>
                        <a href="{{ route('settings.password') }}" class="dropdown-item">
                            <i class="mdi mdi-settings m-r-5"></i>
                            Zmena hesla
                        </a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-item text-primary">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf

                                <button type="submit" class="logout-button">
                                    <i class="mdi mdi-power text-primary"></i>
                                    Odhlásiť sa
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

{{--        <ul class="list-inline menu-left mb-0">--}}
{{--            <li class="float-left">--}}
{{--                <button class="button-menu-mobile open-left waves-effect">--}}
{{--                    <i class="mdi mdi-menu"></i>--}}
{{--                </button>--}}
{{--            </li>--}}
{{--        </ul>--}}
    </nav>
</div>
