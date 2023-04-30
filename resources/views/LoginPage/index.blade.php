@extends("dashboard.template")

<!-- partial -->
@section("login")
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <img src="{{ url('admin/asset/images/logo.svg')}}" alt="logo">
                        </div>
                        <h4>Hello! let's get started</h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>

                        @if (session()->has('error'))
                            <p class="text-danger">{{ session('error') }}</p>
                        @endif
                        <form class="pt-3" method="POST" action=" ">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg"
                                    name="email" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg"
                                    name="password" placeholder="password">
                            </div>

                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN  IN</button>

                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        Keep me signed in
                                    </label>
                                </div>
                                <a href="#" class="auth-link text-black">Forgot password?</a>
                            </div>

                            <div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="{{ url('/register') }}" class="text-primary">Create</a>
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
@endsection
