@extends('admin.main.default')
@section('main-content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Pending Users</h4>
            <div class="text-center">
                @if(Session::has('deleted'))
                <div class="alert alert-danger">
                    <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/remove.gif') }}" alt="img">
                    {{ Session::get('deleted') }}
                </div>
                @endif
            </div>
            <div class="text-center">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/success.gif') }}" alt="img">
                    <h6 class="d-inline mx-2">
                        {{ Session::get('success') }}
                    </h6>
                </div>
                @endif
            </div>
            <div class="table-responsive">


                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pending_user as $d)
                        <tr>
                            
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->number }}</td>
                            <td><span class="badge rounded-pill bg-success text-light fw-bold">{{ $d->role }}</span>
                            </td>
                            <td>
                                <a class="btn btn-success btn-rounded border border-2"
                                    href="{{ url('/admin/approve-users').'/'.$d->id }}">Approve</a>
                                <a class="btn btn-danger btn-rounded border border-2"
                                    href="{{ url('admin/pending-users/delete').'/'.$d->id }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
