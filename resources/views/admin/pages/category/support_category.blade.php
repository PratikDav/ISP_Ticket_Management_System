@extends('admin.main.default')
@section('main-content')
<div class="row grid-margin stretch-card">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Categories</h4>
                <p class="card-description">

                </p>
                <div class="text-center">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/done.gif') }}"
                            alt="img">
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
                <form class="forms-sample" action="{{ url('category/post-category') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputName1">Category Name</label>
                        <input type="text" name="category_name" class="form-control" id="exampleInputName1"
                            placeholder="Write Category...." value="{{ old('category_name') }}">
                        <span class="text-danger">
                            @error('category_name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Category Type</label><br>
                        <select name="category_type" class="form-select form-select-sm form-control"
                            aria-label="Small select example">
                            <option selected value="">Select Type</option>
                            <option value="For Everyone">For Everyone</option>
                            <option value="For Office">For Office</option>
                        </select>
                        <span class="text-danger">
                            @error('category_type')
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
                <h4 class="card-title">Support Categories</h4>
                <div class="text-center">
                    @if(Session::has('deleted'))
                    <div class="alert alert-danger">
                        <img style="width: 30px;" class="rounded-circle" src="{{ asset('admin/images/remove.gif') }}"
                            alt="img">
                        {{ Session::get('deleted') }}
                    </div>
                    @endif
                </div>
                <div class="table-responsive">


                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Category Type</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $c)
                            <tr>
                                <td>{{ $c->category }}</td>
                                <td>{{ $c->category_type }}</td>
                                <td>
                                    <a class="btn btn-danger btn-rounded border border-2"
                                        href="{{ url('category/delete').'/'.$c->id }}"
                                        onclick="return confirm('Are you sure to delete this Category?')">Delete</a>
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
{{-- <div class="col-12 grid-margin stretch-card">




</div> --}}
@endsection
