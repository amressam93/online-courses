@extends('layouts.webiste.master')

@section('title')
    Geeks - Online Courses
@endsection

@section('css')

@endsection

    @section('content')

       @include('layouts.webiste.sliders.slider')

       @include('layouts.webiste.sliders.utilities')


       <!--Start Recommended to you Section -->
       @auth()
       <div class="pt-lg-12 pb-lg-3 pt-8 pb-6">
           <div class="container">
               <div class="row mb-4">
                   <div class="col">
                       <h2 class="mb-0">Let's start learning, <strong>{{auth()->user()->name}}</strong></h2>
                   </div>
               </div>
               <div class="position-relative">
                   <ul class="controls " id="sliderFirstControls">
                       <li class="prev">
                           <i class="fe fe-chevron-left"></i>
                       </li>
                       <li class="next">
                           <i class="fe fe-chevron-right"></i>
                       </li>
                   </ul>
                   <div class="sliderFirst">
                       @foreach($userCourses as $userCourse)
                       <div class="item">
                           <!-- Card -->
                           <div class="card  mb-4 card-hover">
                               <a href="#" class="card-img-top">
                                   @if($userCourse->photo)
                                   <img src="/images/{{$userCourse->photo->filename}}" alt="" class="card-img-top rounded-top-md">
                                   @else
                                    <img src="/images/cases/no_image_found.jpg" alt="" class="card-img-top rounded-top-md">
                                   @endif
                               </a>
                               <!-- Card Body -->
                               <div class="card-body">
                                   <h4 class="mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">{{$userCourse->title}}</a></h4>
                                   <!-- List -->
                                   <ul class="mb-3 list-inline">
                                       <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 30m</li>
                                       <li class="list-inline-item">
                                           <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                               <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                                               <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                                               <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                                           </svg> Intermediate
                                       </li>
                                   </ul>
                                   <div class="lh-1">
                                    <span>
                                <i class="mdi mdi-star text-warning me-n1"></i>
                                <i class="mdi mdi-star text-warning me-n1"></i>
                                <i class="mdi mdi-star text-warning me-n1"></i>
                                <i class="mdi mdi-star text-warning me-n1"></i>
                                <i class="mdi mdi-star text-warning"></i>
                                  </span>
                                       <span class="text-warning">4.5</span>
                                       <span class="fs-6 text-muted">(13,245)</span>
                                   </div>
                               </div>
                               <!-- Card Footer -->
                               <div class="card-footer">
                                   <div class="row align-items-center g-0">
                                       <div class="col-auto">
                                           <img src="{{URL::asset('website/assets/images/avatar/avatar-4.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                       </div>
                                       <div class="col ms-2">
                                           <span>Claire Robertson</span>
                                       </div>
                                       <div class="col-auto">
                                           <a href="#" class="text-muted bookmark">
                                               <i class="fe fe-bookmark  "></i>
                                           </a>
                                       </div>
                                   </div>
                                   <div class="progress mt-3" style="height: 5px;">
                                       <div class="progress-bar bg-success" role="progressbar" style="width: 45%;" aria-valuenow="45"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       @endforeach
                   </div>
               </div>
           </div>
       </div>
       @endauth
       <!--End Recommended to you Section -->

       @php $i = 0; @endphp

       @foreach($tracks as $track)

        @if($track->courses->count() > 0)

       <div class="pb-lg-8 pt-lg-3 py-6">
           <div class="container">
               <div class="row mb-4">
                   <div class="col">
                       <h2 class="mb-0">Last {{$track->name}} Courses</h2>
                   </div>

               </div>
               <div class="position-relative">
                   <ul class="controls {{$track->name.$track->id}}" id="">
                       <li class="prev">
                           <i class="fe fe-chevron-left"></i>
                       </li>
                       <li class="next">
                           <i class="fe fe-chevron-right"></i>
                       </li>
                   </ul>
                   <div class="{{$track->name.'_'.$track->id}}">
                       @foreach($track->courses()->get() as $course)
                       <div class="item">
                           <!-- Card -->
                           <div class="card  mb-4 card-hover equal_height_slider">
                               <a href="pages/course-single.html" class="card-img-top equal_height_slider">
                                   @if($course->photo)
                                       <img src="/images/{{$course->photo->filename}}" alt="" class="card-img-top rounded-top-md">
                                   @else
                                       <img src="/images/cases/no_image_found.jpg" alt="" class="card-img-top rounded-top-md">
                                   @endif
                               </a>
                               <!-- Card Body -->
                               <div class="card-body">
                                   <h4 class="mb-2 text-truncate-line-2 equal_height_slider">
                                       <a href="pages/course-single.html" class="text-inherit">{{$course->title}}</a>
                                   </h4>
                                   <!-- List -->
                                   <ul class="mb-3 list-inline">
                                       <li class="list-inline-item"><i class="far fa-clock me-1"></i>3h 56m</li>
                                       <li class="list-inline-item">
                                           <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                               <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                                               <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                                               <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                                           </svg> Beginner
                                       </li>
                                   </ul>
                                   <div class="lh-1">
                                    <span>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning me-n1"></i>
                                        <i class="mdi mdi-star text-warning"></i>
                                    </span>
                                       <span class="text-warning">4.5</span>
                                       <span class="fs-6 text-muted">({{count($course->users)}}) Enrolled</span>
                                       <br><br>
                                       @if($course->status == 0)
                                           <span class="fw-bold h4 text-success">Free</span>
                                       @else
                                           <span class="fw-bold h4 text-danger">Paid</span>
                                       @endif
                                   </div>

                               </div>

                               <!-- Card Footer -->
                               <div class="card-footer">
                                   <div class="row align-items-center g-0">
                                       <div class="col-auto">
                                           <img src="{{URL::asset('website/assets/images/avatar/avatar-9.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                       </div>
                                       <div class="col ms-2">
                                           <span>Morris Mccoy</span>
                                       </div>
                                       <div class="col-auto">
                                           <a href="#" class="text-muted bookmark">
                                               <i class="fe fe-bookmark  "></i>
                                           </a>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       @endforeach
                   </div>
               </div>
           </div>
       </div>

        @endif


           @if ($i == 1)
               <div class="container">
                   <div class="row mb-4">
                       <div class="col">
                           <h2 class="fw-bold mb-0 text-primary">Famous Topic For You</h2>
                       </div>

                   </div>
                   <div class="row">
                       @foreach($famous_tracks as $track)
                       <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                           <!-- Card -->
                           <div class="card mb-4 card-hover">
                               <div class="d-flex justify-content-between align-items-center p-4">
                                   <div class="d-flex">
                                       <div class="ms-3">
                                           <h4 class="mb-1">
                                               <a href="course-path-single.html" class="text-inherit">
                                                   {{$track->name}}
                                               </a>
                                           </h4>
                                           <p class="mb-0 fs-6">
                                          <span class="me-2"><span class="text-dark fw-medium">{{$track->courses_count}} </span> Courses</span>
                                          <span><span class="text-dark fw-medium">34 </span>Hours</span>
                                           </p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       @endforeach
                   </div>
               </div>
           @endif

           @php $i++; @endphp

       @endforeach

    @endsection

@section('js')

    <script>
        $(document).ready(function () {

            var heights = [];

            $('.equal_height_slider').each(function (){

                heights.push($(this).height());
            });

            var maxHeight = Math.max.apply(null,heights);

            $('.equal_height_slider').height(maxHeight);

        });
    </script>


    <script>

        var tracks = JSON.parse('{{json_encode($tracksname)}}'.replace(/&quot;/g,'"'));

        for (var key in tracks) {

            var value = tracks[key];
            var id    = key;

            if ($("."+value+"_"+id).length) tns({
                container: "."+value+"_"+id,
                loop: !1,
                startIndex: 1,
                items: 1,
                nav: !1,
                autoplay: !0,
                swipeAngle: !1,
                speed: 400,
                autoplayButtonOutput: !1,
                mouseDrag: !0,
                lazyload: !0,
                gutter: 20,
                controlsContainer: "."+value+id,
                responsive: {
                    768: {
                        items: 2
                    },
                    990: {
                        items: 4
                    }
                }
            });


        }

    </script>

@endsection
