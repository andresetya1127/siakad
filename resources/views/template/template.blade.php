<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>SIAKAD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    {{ css_(['bootstrap', 'app', 'icons', 'animate', 'font-awesome']) }}
    @yield('custom_style')

</head>

<body data-topbar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('template.nav')
        @include('template.sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">{{ $page }}</h4>
                            </div>
                        </div>
                    </div>

                    <!-- page-content -->
                    <div class="row">
                        @yield('content')
                    </div>

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © SIAKAD-STMIK Lombok.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    {{ js_(['jquery', 'bootstrap-bundle', 'metis-menu', 'simplebar', 'waves', 'app', 'app-custom', 'counter']) }}

    @yield('custom_script')


</body>


</html>
