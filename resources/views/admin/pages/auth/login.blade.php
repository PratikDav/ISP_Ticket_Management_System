@include('admin.includes.head')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class=" text-center">
                            <img class="mb-3" style="width:250px" src="{{ asset('admin/images/logoSpaceWalker.png') }}" alt="logo">
                        </div>

                        <h6 class="font-weight-light text-center"><span style="color:#FA3609; font-weight:bold;">Log in</span> to <span  style="color:#268FB4; font-weight:bold;">Continue</span></h6>
                        @if(Session::has('success'))
                        <div class="alert alert-success text-center mt-3">
                            {{ Session::get('success') }}
                        </div>
                        @endif

                        @if(Session::has('error'))
                        <div class="alert alert-danger text-center mt-3">
                            {{ Session::get('error') }}
                        </div>
                        @endif
                        <form method="post" action="{{ url('user/login') }}" class="pt-3">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                    placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN IN</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="{{ url('register/form') }}" class="text-primary">Create</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

@include('admin.includes.scripts')
