@extends('admin.main.default')
@section('main-content')
<style>
    #profile_info li {
        list-style: none;
    }

    #profile_info li a {
        text-decoration: none;
        color: black;
        font-weight: 500;
    }

    #profile_info li a:hover {
        text-decoration: none;
        color: #00BAC7;
    }
</style>
<span class="mx-3 font-weight-bold display-4">Account</span>
<div class="row mt-3">
    <div class="col-md-4">
        <div class="card border border-4 ">
            <div class="card-body">
                <div class="text-center mb-5 mt-4">
                    @foreach ($user as $u)
                    @if ($u->id == Session::get('user_id'))
                    @if($u->picture == null)
                    <img style="width: 100px;" class="rounded-circle mb-3 border border-3 p-1"
                        src="{{ asset('admin/images/man.png') }}" alt="img"><br>
                    @else
                    <img style="width: 100px;" class="rounded-circle mb-3 border border-3 p-1"
                        src="{{ asset('thumbnail/'.$u->picture) }}" alt="img"><br>
                    @endif
                    <span class="card-title">{{ $u->name }}</span><br>
                    <span class="card-subtitle text-body-secondary font-weight-bold">{{ $u->role }}</span>
                    @endif
                    @endforeach
                </div>
                <hr>
                <ul id="profile_info">
                    <li>
                        <a href="#basic">
                            <img style="width: 35px;" class=" mx-1 mb-2" src="{{ asset('admin/images/basic.gif') }}"
                                alt="img">
                            <span>Basic Information</span>
                        </a>
                    </li>
                    <li>
                        <a href="#client">
                            <img style="width: 35px;" class=" mx-1 mb-2" src="{{ asset('admin/images/client.gif') }}"
                                alt="img">
                            <span>Client Information</span>
                        </a>
                    </li>
                    <li>
                        <a href="#password">
                            <img style="width: 35px;" class="mx-1 mb-2" src="{{ asset('admin/images/password.gif') }}"
                                alt="img">
                            <span class="mx-1">Password</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div id="basic" class="card border border-4 mb-3">
            <div class="card-body">
                <h5 class="card-title">Basic Information</h5>
                <div class="text-center">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/save.gif') }}"
                            alt="img">
                        <h6 class="d-inline mx-2">
                            {{ Session::get('success') }}
                        </h6>
                    </div>
                    @endif

                    @if(Session::has('failed'))
                    <div class="alert alert-danger">
                        <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/fail.gif') }}"
                            alt="img">
                        {{ Session::get('failed') }}
                    </div>
                    @endif
                </div>
                <hr>
                @foreach ($user as $u)
                @if ($u->id == Session::get('user_id'))
                <form action="{{ url('user-profile/update-basic-information') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1"
                            placeholder="Write Full Name" value="{{ $u->name }}">
                        <span class="text-danger">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail3"
                            placeholder="Email" value="{{ $u->email }}" disabled>
                        <span class="text-danger">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Number</label>
                        <input type="number" name="number" class="form-control" id="exampleInputName1"
                            placeholder="Number" value="{{ $u->number }}">
                        <span class="text-danger">
                            @error('number')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputName1"
                            placeholder="Address..." value="{{ $u->address }}">
                        <span class="text-danger">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Picture</label>
                        <input type="file" name="picture" class="form-control" id="exampleInputName1"
                            value="{{ $u->picture }}">
                        <span class="text-danger">
                            @error('picture')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Save Changes</button>
                </form>
                @endif
                @endforeach
            </div>
        </div>
        @foreach ($user as $u)
        @if ($u->id == Session::get('user_id') && $u->role == 'Client')
        <div id="client" class="card border border-4 mt-4 mb-3">
            <div class="card-body">
                <h5 class="card-title">Client Information</h5>
                <div class="text-center">
                    @if(Session::has('clientInfoUpdateSuccess'))
                    <div class="alert alert-success">
                        <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/save.gif') }}"
                            alt="img">
                        <h6 class="d-inline mx-2">
                            {{ Session::get('clientInfoUpdateSuccess') }}
                        </h6>
                    </div>
                    @endif

                    @if(Session::has('clientInfoUpdateFailed'))
                    <div class="alert alert-danger">
                        <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/fail.gif') }}"
                            alt="img">
                        {{ Session::get('clientInfoUpdateFailed') }}
                    </div>
                    @endif
                </div>
                <hr>
                <form action="{{ url('user-profile/update-client-information') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Client ID</label>
                        <input type="text" name="client_id" class="form-control" id="" placeholder="Client ID"
                            value="{{  $u->client_id }}">
                        <span class="text-danger">
                            @error('client_id')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="">Client Password</label>
                        <input type="text" name="client_password" class="form-control" id=""
                            placeholder="Client Password" value="{{ $u->client_pass }}">
                        <span class="text-danger">
                            @error('client_password')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Save Changes</button>
                </form>

            </div>
        </div>
        @endif
        @endforeach
        <div id="password" class="card border border-4 mt-4 mb-3">
            <div class="card-body">
                <h5 class="card-title">Password</h5>
                <div class="text-center">
                    @if(Session::has('passwordChanged'))
                    <div class="alert alert-success">
                        <img style="width: 40px;" class="rounded-circle"
                            src="{{ asset('admin/images/password_change.gif') }}" alt="img">
                        <h6 class="d-inline mx-2">
                            {{ Session::get('passwordChanged') }}
                        </h6>
                    </div>
                    @endif

                    @if(Session::has('passwordFailed'))
                    <div class="alert alert-danger">
                        <img style="width: 40px;" class="rounded-circle"
                            src="{{ asset('admin/images/password_not_matched.gif') }}" alt="img">
                        {{ Session::get('passwordFailed') }}
                    </div>
                    @endif
                </div>
                <hr>
                @foreach ($user as $u)
                @if ($u->id == Session::get('user_id'))
                <form action="{{ url('user-profile/update-password') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword4">Old Password</label>
                        <input type="password" name="old_password" class="form-control" id="exampleInputPassword4"
                            placeholder="Password">
                        <span class="text-danger">
                            @error('old_password')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="exampleInputPassword4"
                            placeholder="Password">
                        <span class="text-danger">
                            @error('new_password')
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
                    <button type="submit" class="btn btn-primary mr-2">Change Password</button>
                </form>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
