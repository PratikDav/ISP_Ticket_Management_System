@extends('admin.main.default')
@section('main-content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card border border-3">
        <div class="card-body">
            <h4 class="card-title">Super Admin</h4>
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Session::has('user_role') && Session::get('user_role') == 'Super Admin')
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->number }}</td>
                            <td><span class="badge rounded-pill bg-success text-light fw-bold">{{ $d->role }}</span>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card border border-3">
        <div class="card-body">
            <h4 class="card-title">Admins</h4>
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
                        @foreach ($admin as $d)
                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->number }}</td>
                            <td><span class="badge rounded-pill bg-success text-light fw-bold">{{ $d->role }}</span>
                            </td>
                           <td>
                                <a class="btn btn-success btn-rounded border border-2"
                                    href="{{ url('admin/edit').'/'.$d->id }}">Edit</a>
                                <a class="btn btn-danger btn-rounded border border-2"
                                    href="{{ url('admin/delete').'/'.$d->id }}">Delete</a>
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
