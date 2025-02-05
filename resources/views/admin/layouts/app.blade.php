<!DOCTYPE html>
<html lang="en">

    <head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <!-- Title Meta -->
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- Vendor css (Require in all Page) -->
        <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Icons css (Require in all Page) -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css (Require in all Page) -->
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Theme Config js (Require in all Page) -->
        <script src="{{ asset('assets/js/config.min.js') }}"></script>

        @stack('css')
    </head>

    <body>

        <!-- START Wrapper -->
        <div class="wrapper">

            <!-- ========== Topbar Start ========== -->
            @include('admin.layouts.navbar')

            <!-- Right Sidebar (Theme Settings) -->

            <!-- ========== Topbar End ========== -->

            <!-- ========== App Menu Start ========== -->
            @include('admin.layouts.sidebar')
            <!-- ========== App Menu End ========== -->

            <!-- ==================================================== -->
            <!-- Start right Content here -->
            <!-- ==================================================== -->
            <div class="page-content">
                <!-- Start Container Fluid -->
                @yield('content')
                <!-- End Container Fluid -->

                <!-- ========== Footer Start ========== -->
                @include('admin.layouts.footer')
                <!-- ========== Footer End ========== -->

            </div>
            <!-- ==================================================== -->
            <!-- End Page Content -->
            <!-- ==================================================== -->

        </div>
        <!-- END Wrapper -->

        <!-- Vendor Javascript (Require in all Page) -->
        <script src="{{ asset('assets/js/vendor.js') }}"></script>

        <!-- App Javascript (Require in all Page) -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

        @stack('js')

    </body>

</html>
