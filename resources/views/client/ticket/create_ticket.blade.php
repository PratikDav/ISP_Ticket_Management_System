@extends('admin.main.default')
@section('main-content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create Ticket</h4>
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
                    <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/fail.gif') }}" alt="img">
                    {{ Session::get('failed') }}
                </div>
                @endif
            </div>
            <form class="forms-sample" action="{{ url('ticket/post-ticket') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Support Category</label><br>
                <select name="category" class="form-select form-select-sm form-control" aria-label="Small select example">
                    <option selected value="">Select Category</option>
                    @foreach ($category as $d)
                    <option value="{{ $d->id }}">{{ $d->category }}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('category')
                    {{ $message }}
                    @enderror
                </span>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="form-label">Problem Massage</label>
                    <textarea class="form-control" name="problem_message" id="exampleFormControlTextarea1" value="{{ old('problem_message') }}" rows="6"></textarea>
                    <span class="text-danger">
                        @error('problem_message')
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
