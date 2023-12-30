<div class="row grid-margin stretch-card">

    @foreach ($features as $f)


    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('thumbnail/'.$f->feature_banner) }}" class="card-img-top" alt="..." height="100%"
                width="100%">
            <div class="card-body">
                <h5 class="card-title text-center">{{ $f->feature_name }}</h5>
                <div class="text-center">
                    <a href="{{ $f->feature_url }}" class="btn btn-primary">Go to Link</a>
                </div>
            </div>
        </div>
    </div>
    {{-- <img width="" src="{{ asset('admin/images/coming-soon.gif') }}" class="" alt="logo" /> --}}

    @endforeach
</div>
