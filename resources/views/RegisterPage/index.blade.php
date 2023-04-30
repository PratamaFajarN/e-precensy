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
                        <h4>New here?</h4>
                        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                        <form class="pt-3" action="{{ route('registerpost') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="username" class="form-control form-control-lg" id="exampleInputUsername1"
                                    placeholder="username">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                    placeholder="Email">
                            </div>

                            <div class="form-group">
                                <input type="password"  name="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        I agree to all Terms & Conditions
                                    </label>
                                </div>
                            </div>
                            <div class="mt-3">
                                <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                      placeholder="Register">
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Already have an account? <a href="{{ url('/login') }}" class="text-primary">Login</a>
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
<!-- container-scroller -->
<!-- plugins:js -->
@endsection
