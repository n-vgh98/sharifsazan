<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    @include('user.layouts.head')
    <title>@yield('title')</title>
    @yield('head')
</head>


<body>
    @include('user.layouts.header')

    @yield('content')

    @include('user.layouts.footer')

    @include('user.layouts.scripts')
    @yield('script')
</body>

</html>
