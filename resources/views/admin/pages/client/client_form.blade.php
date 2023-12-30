@extends('admin.main.default')
@section('main-content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $title }}</h4>
            <p class="card-description">
                {{ $description }}
            </p>
            <div class="text-center">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/success.gif') }}"
                        alt="img">
                    <h6 class="d-inline mx-2">
                        {{ Session::get('success') }}
                    </h6>
                </div>
                @endif

                @if(Session::has('failed'))
                <div class="alert alert-danger">
                    <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/fail2.gif') }}"
                        alt="img">
                    {{ Session::get('failed') }}
                </div>
                @endif
            </div>
            <form class="forms-sample" action="{{ $url }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                        placeholder="Write Full Name" value="{{ $title == " Update Client" ? $client->name : old('name')
                    }}">
                    <span class="text-danger">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Number</label>
                    <input type="number" name="number" class="form-control" id="exampleInputName1" placeholder="Number"
                        value="{{ $title == " Update Client" ? $client->number : old('number') }}">
                    <span class="text-danger">
                        @error('number')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputName1"
                        placeholder="Address..." value="{{ $title == " Update Client" ? $client->address :
                    old('address') }}">
                    <span class="text-danger">
                        @error('address')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                @if ($title == " Update Client")
                <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email"
                        value="{{ $client->email }}" disabled>
                    <span class="text-danger">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                @endif
                @if ($title == "Add Client")
                <div class="form-group">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email"
                        value="{{ old('email') }}">
                    <span class="text-danger">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword4"
                        placeholder="Password">
                    <span class="text-danger">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword4"
                        placeholder="Password">
                    <span class="text-danger">
                        @error('confirm_password')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                @endif
                <div class="form-group">
                    <label for="">Client ID</label>
                    <input type="text" name="client_id" class="form-control" id="" placeholder="Client ID"
                        value="{{ $title == " Update Client" ? $client->client_id : old('client_id') }}">
                    <span class="text-danger">
                        @error('client_id')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="">Client Password</label>
                    <input type="text" name="client_password" class="form-control" id="" placeholder="Client Password"
                        value="{{ $title == " Update Client" ? $client->client_pass : old('client_password') }}">
                    <span class="text-danger">
                        @error('client_password')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Picture</label>
                    <input type="file" name="picture" class="form-control" id="exampleInputName1"
                        value="{{ old('picture') }}">
                    <span class="text-danger">
                        @error('picture')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection
