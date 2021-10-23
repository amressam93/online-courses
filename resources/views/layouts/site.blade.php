<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LearnCode') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Admin custom CSS -->
    <link type="text/css" href="/css/style.css?v=1.0.0" rel="stylesheet">
</head>
<body class="{{ $class ?? '' }}">

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">

{{--    <a class="navbar-brand" href="#">--}}
{{--        <img src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">--}}
{{--        LearnCode--}}
{{--    </a>--}}


    <a class="navbar-brand" href="#"><span class="logo">LC</span> LearnCode</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <form class="form-inline my-2 my-lg-0 navbar-form">
            <div class="input-group input-group-search mx-auto">
                <input type="search" class="form-control" placeholder="find your course..." aria-label="Search" aria-describedby="search-button-addon">
            </div>
        </form>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="mr-auto"></div>
        <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link <span class="sr-only"></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link @auth dropdown-toggle @endauth" href="#" id="navbarDropdown" role="button" data-display="static" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @auth()
                        {{auth()->user()->name}}
                    @endauth
                    @guest()
                        Login
                    @endguest
                </a>
                @auth()
                <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">My Courses</a>
                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
                @endauth
            </li>

        </ul>

    </div>
</nav>
<!-- End Navbar-->

@yield('home_picture')


<!-- js script-->
<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>

<!-- bootstrap js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<!-- custom js  -->
<script src="/js/script.js"></script>

<!-- End js scripts -->
</body>
</html>

