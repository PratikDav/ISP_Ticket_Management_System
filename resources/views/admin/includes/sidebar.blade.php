<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/grid.png') }}" alt="img">
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @if(Session::has('user_role') && Session::get('user_role') == 'Super Admin')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#superAdmin" aria-expanded="false"
                aria-controls="superAdmin">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/superAdmin.png') }}" alt="img">
                <span class="menu-title">Super Admin</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="superAdmin">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/form') }}">Create Admin</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/show') }}">Participants</a></li>
                </ul>
            </div>
        </li>
        @endif
        @if(Session::has('user_role') && Session::get('user_role') == 'Admin')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#superAdmin" aria-expanded="false"
                aria-controls="superAdmin">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/admin.png') }}" alt="img">
                <span class="menu-title">Admin</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="superAdmin">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/form') }}">Create Admin</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/show') }}">Participants</a></li>
                </ul>
            </div>
        </li>
        @endif
        @if(Session::has('user_role') && Session::get('user_role') == 'Admin' or Session::get('user_role') == 'Super Admin')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/client.png') }}" alt="img">
                <span class="menu-title">Clients</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('client/form') }}">Create Client</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('client/show') }}">Participants</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/pending-users') }}">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/pending.png') }}" alt="img">
                <span class="menu-title">Pending Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/tickets.png') }}" alt="img">
                <span class="menu-title">Tickets</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/pending-ticket') }}">Pending
                            Request</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/ticket/ticket-history') }}">Tickets
                            History</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('category/create-category') }}">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/categories.png') }}" alt="img">
                <span class="menu-title">Support Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/messaging') }}">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/msg.png') }}" alt="img">
                <span class="menu-title">Messaging</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/features') }}">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/feature.png') }}" alt="img">
                <span class="menu-title">Features</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('packages') }}">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/package.png') }}" alt="img">
                <span class="menu-title">Packages</span>
            </a>
        </li>
        {{-- @if(Session::has('user_role') && Session::get('user_role') == 'Super Admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/control_access') }}">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/no.png') }}" alt="img">
                <span class="menu-title">Control Access</span>
            </a>
        </li>
        @endif --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/supports') }}">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/support.png') }}" alt="img">
                <span class="menu-title">Supports</span>
            </a>
        </li>
        @endif



        @if(Session::has('user_role') && Session::get('user_role') == 'Client')
        <li class="nav-item">
            <a class="nav-link" href="{{ url('ticket/create-ticket') }}">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/new_msg.png') }}" alt="img">
                <span class="menu-title">Create Ticket</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('ticket/ticket-history') }}">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/history.png') }}" alt="img">
                <span class="menu-title">Ticket History</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('client/messaging') }}">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/msg.png') }}" alt="img">
                <span class="menu-title">Messaging</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('client/supports') }}">
                <img style="width: 30px;" class="rounded-circle mx-2 border border-3 p-1"
                    src="{{ asset('admin/images/support.png') }}" alt="img">
                <span class="menu-title">Supports</span>
            </a>
        </li>
        @endif


    </ul>
</nav>
