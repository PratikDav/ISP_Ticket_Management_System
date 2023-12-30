@extends('admin.main.default')
@section('main-content')
<div class="col-12 grid-margin stretch-card">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <div class="text-center">
                <img style="width: 140px;" class="rounded-circle mb-1 border border-3 p-1"
                    src="{{ asset('admin/images/developer.jpeg') }}" alt="img"><br>
                <span class="card-title">Pratik Dav</span><br>
                <span class="card-subtitle mb-2 text-body-secondary mt-2 mb-2">Web Developer</span><br><br>
                <span class="card-text ">Email Address : royonup@gmail.com</span><br>
                <span class="card-text ">Contact Number : 01852088728</span>
            </div>
            <div class="mt-3">
                <img style="width: 50px;" class="" src="{{ asset('admin/images/customer-support.gif') }}" alt="img">
                <span class="card-text mt-5 text-secondary">*If any quires about this system, contact me without any
                    hesitation..........................</span>
            </div>

        </div>
    </div>
</div>
@endsection
