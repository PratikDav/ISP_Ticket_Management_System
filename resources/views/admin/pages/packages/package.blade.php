@extends('admin.main.default')
@section('main-content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Packages</h4>
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Mbps</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($package as $d)
                                <tr>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->mbps }}</td>
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

        <div class="col-lg-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">New 'Package' Entry</h4>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <label for=""><strong>Package Name</strong></label>
                                <input id="name" type="text" name="name" class="form-control"
                                    placeholder="Example: 'Super Start'" aria-label="First name" autocomplete="off"
                                    value="{{ old('name') }}">
                                <span class="text-danger">
                                    @error('name')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-12">
                                <label for=""><strong>Mbps</strong></label>
                                <input id="mbps" type="text" name="mbps" class="form-control"
                                    placeholder="Example: 50" aria-label="mbps" autocomplete="off"
                                    value="{{ old('mbps') }}">
                                <span class="text-danger">
                                    @error('mbps')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-12 mt-3 text-center">
                                <button type="submit" class="w-50  btn btn-success btn-rounded mb-3">
                                    <span>Add</span> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
