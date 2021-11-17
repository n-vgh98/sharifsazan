<!DOCTYPE html>
<html>

<head>

    @include('writer.layouts.head')
    <title>@yield('sitetitle')</title>

    @yield('head')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        @include('writer.layouts.header')
        <!-- Left side column. contains the logo and sidebar -->
        @include('writer.layouts.sidebar')
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
                @include('writer.layouts.eror')
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('writer.layouts.footer')

        <!-- Control Sidebar -->
        @include('writer.layouts.controlsidebar')
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    @include('writer.layouts.scripts')
    @yield('script')
</body>

</html>
