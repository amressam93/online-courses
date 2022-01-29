<!DOCTYPE html>
<html lang="en">

<head>

@include('layouts.webiste.headers.header')

</head>

<body>

    @auth()
        @include('layouts.webiste.navbars.auth')
    @endauth


    @guest()
        @include('layouts.webiste.navbars.guest')
    @endguest

    <!-- Page Content -->

    @yield('content')

    <!--End Content -->

{{--    @include('layouts.webiste.footers.footer')--}}

    @yield('footer')

    @include('layouts.webiste.footers.scripts')

</body>

</html>
