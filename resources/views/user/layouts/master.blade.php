<!DOCTYPE html>
@if ($local = app()->getLocale() == 'fa')
<html lang="fa" dir="rtl">
@else
<html lang="en" dir="ltr">

@endif

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

    {{-- sweet alert --}}
    @include('user.layouts.sweetalert.error')

    <!-- START FOOTER  -->
    <footer>
        @include('user.layouts.footer')

    </footer>
    <!-- END FOOTER -->
    @include('user.layouts.scripts')
    @yield('scripts')
</body>

</html>
