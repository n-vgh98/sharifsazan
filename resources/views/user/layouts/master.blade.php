<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    @include('user.layouts.head')
    @yield('header')
</head>


<body>
    <div id="go-to-top"></div>
    <!-- START HEADER -->
    <header>
        @include('user.layouts.header')
    </header>
    <!-- END HEADER -->

    @yield('content')

    <!-- START FOOTER  -->
    <footer>
        @include('user.layouts.footer')

    </footer>
    <!-- END FOOTER -->
    @include('user.layouts.scripts')
    @yield('scripts')
</body>

</html>
