<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('../../assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../../assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('../../assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('../../assets/images/favicon.png') }}" />
    @stack('css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        @if (Auth::user()->type_account == 'admin')
            @include('layouts.admin.main-slider-admin')
        @endif

        @if (Auth::user()->type_account == 'trader')
            @include('layouts.trader.main-slider-trader')
        @endif
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            @if (Auth::user()->type_account == 'admin')
            @include('layouts.admin.main-nav-admin')
        @endif

        @if (Auth::user()->type_account == 'trader')
            @include('layouts.trader.main-nav-trader')
        @endif
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                   {{$slot}}
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Muhanad
                            Alnamruti</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <a href=""
                                target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('../../assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('../../assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('../../assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('../../assets/js/misc.js') }}"></script>
    <script src="{{ asset('../../assets/js/settings.js') }}"></script>
    <script src="{{ asset('../../assets/js/todolist.js') }}"></script>
    @stack('js')
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

</html>
