@extends('admin.main.default')
@section('main-content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Send Message to Client</h4>
            <p class="card-description">

            </p>
            <div class="text-center">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/direct.gif') }}" alt="img">
                    <h6 class="d-inline mx-2">
                        {{ Session::get('success') }}
                    </h6>
                </div>
                @endif

                @if(Session::has('failed'))
                <div class="alert alert-danger ">
                    <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/fail.gif') }}" alt="img">
                   {{ Session::get('failed') }}
                </div>
                @endif
            </div>
            <form action="{{ url('admin/sent-message-to-client') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail3">Client Email Address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Enter Client Email"
                        value="{{ old('email') }}">
                    <span class="text-danger">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="form-label">Massage</label>
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" value="{{ old('message') }}"
                        rows="6"></textarea>
                    <span class="text-danger">
                        @error('message')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <button title="send" class="btn btn-sm border border-2" style="background-color:#F2F4FD" type="submit">

                    <span class="font-weight-bold">Send</span>
                    <img style="width: 20px; height:20px" class="align-self-center" src="{{ asset('admin/images/send.png') }}" alt="img">
                </button>
                <button type="reset" class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection
