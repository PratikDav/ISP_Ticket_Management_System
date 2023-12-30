@extends('admin.main.default')
@section('main-content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 mb-4 mb-xl-0">
                {{-- <div class="float-end"> --}}
                    <span class="font-weight-bold float-right">My Ip Address is: <span class="text-info">{{ $ip }}</span></span>
                {{-- </div> --}}
                <h3 class="font-weight-bold">Welcome
                    <span class="text-primary">
                        {{ Session::get('user_name') }}
                    </span>
                    <span class="badge rounded-pill bg-info text-light">
                        {{ Session::get('user_role') }}</span>
                </h3>
                @if(Session::has('user_role') && Session::get('user_role') == 'Client')
                Client of <span style="font-weight:bolder; color:#122996">Space Walker</span>
                @elseif(Session::has('user_role') && Session::get('user_role') == 'Super Admin')
                Admin of <span style="font-weight:bolder; color:#122996">Space Walker</span>
                @endif

            </div>
        </div>
    </div>
</div>
@if(Session::has('user_role') && Session::get('user_role') == 'Super Admin' or Session::get('user_role') == 'Admin')
<div class="row">
    <div class="col-md-12 grid-margin transparent">
        <div class="row">
            @if(Session::has('user_role') && Session::get('user_role') == 'Super Admin')
            <div class="col-md-4 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4">Super Admins</p>
                        <p class="fs-30 mb-2">{{ $totalSuperAdmin }}</p>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-4 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4">Admin</p>
                        <p class="fs-30 mb-2">{{ $totalAdmin }}</p>
                        <p class="fs-3 mb-2 mt-2">Pending Admin: {{ $totalPendingAdmin }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4">Client</p>
                        <p class="fs-30 mb-2">{{ $totalClient }}</p>
                        <p class="fs-3 mb-2 mt-2">Pending Client: {{ $totalPendingClient }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

    </div>
</div>
@elseif(Session::has('user_role') && Session::get('user_role') == 'Client')
<div class="row">
    <div class="col-md-12 grid-margin transparent">
        @include('client.client_dashboard')
    </div>
</div>
@endif

@endsection
