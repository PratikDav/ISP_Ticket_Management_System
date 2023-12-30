<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ url('/home') }}">
            <span>
                <img width="" src="{{ asset('admin/images/logoSpaceWalker2.png') }}" class="mr-2 mx-4" alt="logo" />
            </span>
        </a>

    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                    <h3 class="mt-2">Ticket Management System - "<span style="color:#248AFD">Space Walker</span>"</h3>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">

                    @if(Session::get('user_picture') == null)
                    <img  src="{{ asset('admin/images/man.png') }}" alt="img"><br>
                    @else
                    <img src="{{ asset('thumbnail/'.Session::get('user_picture')) }}" alt="img"><br>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{ url('user/profile') }}">
                        <i class="ti-settings text-primary"></i>
                        My Profile
                    </a>
                    <a class="dropdown-item" href="{{ url('logout') }}">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
