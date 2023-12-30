@extends('admin.main.default')
@section('main-content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Clients</h4>
            <div class="text-center">
                @if(Session::has('deleted'))
                <div class="alert alert-danger">
                    {{ Session::get('deleted') }}
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
                            <th>Client ID</th>
                            <th>Password(Wifi)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($client as $d)
                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->email }}</td>
                            <td>{{ $d->number }}</td>
                            @if ($d->client_id)
                            <td>{{ $d->client_id }}</td>
                            @else
                            <td>N/A</td>
                            @endif
                            @if ($d->client_pass)
                            <td>{{ $d->client_pass }}</td>
                            @else
                            <td>N/A</td>
                            @endif
                            <td>
                                <a class="btn btn-info btn-rounded border border-2"
                                    href="{{ url('client/edit').'/'.$d->id }}">Edit</a>
                                <a class="btn btn-danger btn-rounded border border-2"
                                    href="{{ url('client/delete').'/'.$d->id }}">Delete</a>
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
