<!-- Start slider -->
<div class="bg-primary">
    <div class="container">
        <!-- Hero Section -->
        <div class="row align-items-center g-0">
            <div class="col-xl-5 col-lg-6 col-md-12">
                <div class="py-5 py-lg-0">
                    <h1 class="text-white display-4 fw-bold">Welcome to Geeks UI Learning Application
                    </h1>
                    <p class="text-white-50 mb-4 lead">
                        Start Learning {{$countOfFreeCourses}} Courses For <strong style="color: white">Free</strong><br>
                        More Than {{$countOfUsers}} Users have Enrolled In {{$countOfCourses}} Courses In {{$countOfTrack}} Track
                    </p>
                    <a href="{{route('all_courses')}}" class="btn btn-success">Browse Courses</a>
                    <a href="{{route('register')}}" class="btn btn-white">Are You Instructor?</a>
                </div>
            </div>
            <div class=" col-xl-7 col-lg-6 col-md-12 text-lg-end text-center">
                <img src="{{URL::asset('website/assets/images/hero/hero-img.png')}}" alt="" class="img-fluid" />
            </div>
        </div>
    </div>
</div>
<!-- End slider-->
