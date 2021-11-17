<!DOCTYPE html>
<html>

<head>

    @include('admin.layouts.head')
    <title>@yield('sitetitle')</title>

    @yield('head')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include('admin.layouts.header')
        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('pagetitle')
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                @include('admin.layouts.eror')
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('admin.layouts.footer')

        <!-- Control Sidebar -->
        @include('admin.layouts.controlsidebar')
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    @include('admin.layouts.scripts')
    @yield('script')
</body>

</html>
