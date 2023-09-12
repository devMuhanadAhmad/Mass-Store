<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">{{ __('Login') }}</h3>
                            @if (\Session::has('message'))
                            <div class="alert alert-danger mt-1" role="alert">
                                {{session('message')}}
                                </div>
                            @endif
                            @if (\Session::has('success'))
                            <div class="alert alert-danger mt-1" role="alert">
                                {{session('success')}}
                                </div>
                            @endif
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Username or email *</label>
                                    <input type="text" name="email" class="form-control p_input" required>
                                </div>
                                <div class="form-group">
                                    <label>Password *</label>
                                    <input type="password" name="password" class="form-control p_input" required>
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"> Remember me </label>
                                    </div>
                                    @if (Route::has('forget.password.get'))
                                        <a href="{{ route('forget.password.get') }}" class="forgot-pass">Forgot
                                            password</a>
                                    @endif
                                    @if (Route::has('mobile.forget.password.get'))
                                        <a href="{{ route('mobile.forget.password.get') }}" class="forgot-pass">Forgot
                                            password</a>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-primary btn-block enter-btn w-50">Login</button>
                                </div>
                                <!--
                                    <div class="d-flex">
                                    <button class="btn btn-facebook me-2 col">
                                        <i class="mdi mdi-facebook"></i>{{-- route('auth.socilaite.redirect','facebook') --}} Facebook </button>
                                    <a class="btn btn-google col" href="{{-- route('auth.socilaite.redirect','google') --}}">
                                        <i class="mdi mdi-google-plus"></i> Google plus </a>
                                    </div>
                                -->
                                <p class="sign-up">Don't have an Account?<a href="{{ route('register') }}"> Sign Up</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>
