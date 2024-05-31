<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
@include('admin.layout.head')
<body>
    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="card overflow-hidden">
                            <div class="row g-0">                           
                                <!-- end col -->
                                <div class="col-lg-10 m-auto">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Welcome Back !</h5>                                            
                                        </div>

                                        <div class="mt-4">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf                        
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Email</label>
                                                    <input type="email" id="email" name="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror"  placeholder="Enter email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                </div>
                                                <div class="mb-3">
                                                    {{-- <div class="float-end">
                                                        <a href="auth-pass-reset-cover.html" class="text-muted">Forgot password?</a>
                                                    </div> --}}
                                                    <label class="form-label" for="password-input">Password</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input  id="password" type="password" placeholder="Enter password" class="form-control pe-5 password-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" type="password" class="form-control " placeholder="Enter password">
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {!! NoCaptcha::display() !!}
                                                    @if ($errors->has('g-recaptcha-response'))
                                                        <span>
                                                            <strong style="color: red">{{ $errors->first('g-recaptcha-response') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                {{-- <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                                    <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                                </div> --}}
                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Sign In</button>
                                                </div>
                                               
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

    </div>
    <!-- end auth-page-wrapper -->

    @include('admin.layout.script')
</body>

</html>