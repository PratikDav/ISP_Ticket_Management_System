@extends('admin.main.default')
@section('main-content')
<div class="card border border-4">
    <div class="card-body">
        <h5 class="card-title">See messages</h5>
        @foreach ($response as $r)
        @if (Session::get('user_email') == $r->receiver_email)
        <div class="container mt-5">
            <h6 class="card-subtitle mb-1 text-body-secondary mx-5">
                <div class="text-center">
                    <span>--------- {{ $r->response_created_at }} ---------</span>
                </div>
                <img style="width: 30px;" class="rounded-circle border border-3"
                    src="{{ asset('admin/images/admin.gif') }}" alt="img">
                <span class="m-1 font-weight-bold">{{ $r->admin_name }}</span>
                <img style="width: 20px;" class="mt-3" src="{{ asset('admin/images/arrow.png') }}" alt="img">
            </h6>
            <div style="margin-left: 130px; margin-right: 130px; background-color:#EFF2FB"
                class="card-text rounded-pill border border-2">
                <div class="p-2 m-2">
                    <p class="">{{ $r->response_messages }}</p>
                </div>
            </div>
        </div>
        <hr>
        @else
        <div class="text-center">
            <img style="width: 100px;" class="mb-2" src="{{ asset('admin/images/dove.gif') }}" alt="img">
            <h5 class="font-weight-bold">............Waiting for Admin Response...........</h5>
        </div>
        @endif
        @endforeach
        {{-- @else
        <div class="text-center">
            <img style="width: 100px;" class="mb-2" src="{{ asset('admin/images/dove.gif') }}" alt="img">
            <h5 class="font-weight-bold">............Waiting for Admin Response...........</h5>
        </div>
        @endif --}}
    </div>
</div>
@endsection
