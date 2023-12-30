@extends('admin.main.default')
@section('main-content')
<div class="row grid-margin stretch-card">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Feature</h4>
                <p class="card-description">
                </p>
                <div class="text-center">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/done.gif') }}" alt="img">
                        <h6 class="d-inline mx-2">
                            {{ Session::get('success') }}
                        </h6>
                    </div>
                    @endif

                    @if(Session::has('failed'))
                    <div class="alert alert-danger">
                        {{ Session::get('failed') }}
                    </div>
                    @endif
                </div>
                <form class="forms-sample" action="{{ url('features/add-features') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputName1">Feature Name</label>
                        <input type="text" name="feature_name" class="form-control" id="exampleInputName1"
                            placeholder="Feature Name" value="{{ old('feature_name') }}">
                        <span class="text-danger">
                            @error('feature_name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Feature Banner</label>
                        <input type="file" name="feature_banner" class="form-control" id="exampleInputName1"
                            value="{{ old('feature_banner') }}">
                        <span class="text-danger">
                            @error('feature_banner')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Feature URL</label>
                        <input type="text" name="feature_url" class="form-control" id="exampleInputName1"
                            placeholder="Feature URL" value="{{ old('feature_url') }}">
                        <span class="text-danger">
                            @error('feature_url')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Feature Details</label>
                        <textarea class="form-control" name="feature_details" placeholder="Feature Details........"
                            id="exampleFormControlTextarea1" value="{{ old('feature_details') }}" rows="4"></textarea>
                        <span class="text-danger">
                            @error('feature_details')
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
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Features</h4>
                <div class="text-center">
                    @if(Session::has('deleted'))
                    <div class="alert alert-danger">
                        <img style="width: 30px;" class="rounded-circle" src="{{ asset('admin/images/remove.gif') }}" alt="img">
                        {{ Session::get('deleted') }}
                    </div>
                    @endif
                </div>
                <div class="table-responsive">


                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>Feature Name</th>
                                <th>Feature thumbnail</th>
                                <th>Details</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($features as $f)
                            <tr>
                                <td>
                                    {{ $f->feature_name }}
                                </td>
                                <td>
                                    <img src="{{ asset('thumbnail/'.$f->feature_banner) }}" alt="" height="40px"
                                        width="40px">
                                </td>
                                <td>{{ $f->feature_details }}</td>
                                <td>
                                    <a class="btn btn-info btn-rounded border border-2"
                                        href="{{ $f->feature_url }}">URL</a>
                                    <a class="btn btn-danger btn-rounded border border-2"
                                        href="{{ url('feature/delete').'/'.$f->id }}" onclick="return confirm('Are you sure to delete this feature?')">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
