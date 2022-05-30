<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Webstránka</li>

                @if(!auth()->user()->driver && !auth()->user()->operator && !auth()->user()->supervisor)
                    <li>
                        <a href="{{ route('dashboard.overview') }}" class="waves-effect">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span>Prehľad</span>
                        </a>
                    </li>
                @endif


                @if(!auth()->user()->driver && !auth()->user()->operator)
                    <li>
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="mdi mdi-account-multiple"></i>
                            <span>Zamestnanci<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="{{ route('users.index') }}">
                                    Zoznam zamestnancov
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


                @if(!auth()->user()->driver)
                    <li>
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="mdi mdi-car"></i>
                            <span>Vozidlá<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="{{ route('cars.index') }}">
                                    Zoznam vozidiel
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(!auth()->user()->driver)
                    <li>
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="mdi mdi-checkbox-marked"></i>
                            <span>Smeny<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="{{ route('shifts.index') }}">
                                    Zoznam smien
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="mdi mdi-cart"></i>
                        <span>Objednávky<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('drives.index') }}">
                                Zoznam objednávok
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
