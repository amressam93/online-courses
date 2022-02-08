<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.webiste.headers.header')

</head>

<body class="bg-white">

<!-- Page Content -->
<div>
    <div class="container d-flex flex-column">
        <div class="row">
            <div class="offset-xl-1 col-xl-2 col-lg-12 col-md-12 col-12">
                <div class="mt-4">
                    <a href="../index-2.html"><img src="{{URL::asset('website/assets/images/brand/logo/LearnCode3.png')}}" alt=""></a>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center g-0 py-lg-22 py-10">
            <!-- Docs -->
            <div class="offset-xl-1 col-xl-4 col-lg-6 col-md-12 col-12 text-center text-lg-start">
                <h1 class="display-1 mb-3">Access Restricted</h1>

                <p class="mb-5 lead">Oops! Sorry, you don’t have premission to View this link , Or the link may not be available.</p>
                <a href="{{url('/')}}" class="btn btn-primary me-2">Back to Safety</a>
            </div>
            <!-- img -->
            <div class="offset-xl-1 col-xl-6 col-lg-6 col-md-12 col-12 mt-8 mt-lg-0">
                <img src="{{URL::asset('website/assets/images/error/access_restricted.jpg')}}" alt="" class="w-100" />
            </div>
        </div>
    </div>
</div>


@include('layouts.webiste.footers.scripts')

</body>

</html>
