@extends('layouts.webiste.master')

@section('title') My Courses | LearnCode @endsection

@section('css')

@endsection

@section('content')

    <!-- Page Content -->
    <div class="pt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <!-- Bg -->
                    <div class=" pt-16 rounded-top-md " style="background: url({{URL::asset('website/assets/images/background/profile-bg.jpg')}}) no-repeat;background-size: cover;">
                    </div>
                    <div
                        class="d-flex align-items-end justify-content-between bg-white px-4  pt-2 pb-4 rounded-bottom-md shadow-sm ">
                        <div class="d-flex align-items-center">
                            <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                                @if(auth()->user()->photo)
                                   <img src="/images/{{auth()->user()->photo->filename}}" class="avatar-xl rounded-circle border border-4 border-white" alt="{{auth()->user()->name}}">
                                @else
                                    <img src="/images/cases/default_user.png" class="avatar-xl rounded-circle border border-4 border-white" alt="{{auth()->user()->name}}">
                                @endif
                            </div>
                            <div class="lh-1">
                                <h2 class="mb-0">{{auth()->user()->name}}</h2>
                            </div>
                        </div>
                        <div>
                            <a href="{{route('profile')}}" class="btn btn-primary btn-sm d-none d-md-block">Account Setting</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="pb-5 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Side Navbar -->
                    <ul class="nav nav-lb-tab mb-6" id="tab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="currentlyLearning-tab" data-bs-toggle="pill" href="#currentlyLearning" role="tab"
                               aria-controls="currentlyLearning" aria-selected="false">My Courses</a>
                        </li>

                        <li class="nav-item ms-0" role="presentation">
                            <a class="nav-link" id="bookmarked-tab" data-bs-toggle="pill" href="#myTracks" role="tab"
                               aria-controls="bookmarked" aria-selected="true">My Tracks </a>
                        </li>

                    </ul>
                    <!-- Tab content -->
                    <div class="tab-content" id="tabContent">

                        <!--My courses-->
                        <div class="tab-pane fade show active" id="currentlyLearning" role="tabpanel" aria-labelledby="currentlyLearning-tab">

                            <div class="row mb-4">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-xl-8 col-md-6 col-12">
                                            @if(count($user_courses) > 0)
                                                <h4 class="mb-3 mb-md-0">Total {{$user_courses->count()}} Course</h4>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @forelse ($user_courses as $course)
                                    <div class="col-lg-3 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card  mb-4 card-hover">
                                            <a href="{{route('course_lessons',['slug' => $course->slug , 'courseId' => $course->id])}}" class="card-img-top">
                                                @if($course->photo)
                                                    <img src="/images/{{$course->photo->filename}}" alt="" class="card-img-top rounded-top-md">
                                                @else
                                                    <img src="/images/cases/no_image_found.jpg" alt="" class="card-img-top rounded-top-md">
                                                @endif
                                            </a>
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <h3 class="h4 mb-2 text-truncate-line-2 ">
                                                    <a href="{{route('course_lessons',['slug' => $course->slug , 'courseId' => $course->id])}}" class="text-inherit">{{$course->title}}</a>
                                                </h3>

                                                <p class="mb-2 fs-6"><strong class="badge bg-secondary">Track: </strong> <a href="/tracks/{{$course->track->name}}" style="color:#a8a3b9"> {{$course->track->name}} </a></p>

                                                <!-- List inline -->
                                                <ul class="mb-3  list-inline">
                                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>3h 56m</li>
                                                    @if($course->level->name == "Beginner")
                                                        <li class="list-inline-item">
                                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                                                                </rect>
                                                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
                                                                </rect>
                                                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                                                </rect>
                                                            </svg>{{$course->level->name}}
                                                        </li>
                                                    @elseif($course->level->name == "Intermediate")
                                                        <li class="list-inline-item">
                                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                                                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                                                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                                                            </svg> {{$course->level->name}}
                                                        </li>
                                                    @elseif($course->level->name == "Advance")
                                                        <li class="list-inline-item">
                                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                                                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                                                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE" />
                                                            </svg> {{$course->level->name}}
                                                        </li>
                                                    @endif
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
                                                </div>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer">
                                                <div class="row align-items-center g-0">
                                                    <div class="col-auto">
                                                        <img src="{{URL::asset('website/assets/images/avatar/avatar-6.jpg')}}" class="rounded-circle avatar-xs" alt="">
                                                    </div>
                                                    <div class="col ms-2">
                                                        <span>Morris Mccoy</span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="#" class="removeBookmark">
                                                            <i class="fas fa-bookmark"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="progress mt-3" style="height: 5px;">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center mt-5">
                                        <p>Oops ! You are not Enroll to any course </p>
                                    </div>
                                @endforelse
                            </div>

                        </div>
                        <!--My Tracks-->
                        <div class="tab-pane fade" id="myTracks" role="tabpanel" aria-labelledby="bookmarked-tab">
                            <div class="container">
                                <div class="row mb-4">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-xl-8 col-md-6 col-12">
                                                @if(count($tracks) > 0)
                                                <h4 class="mb-3 mb-md-0">Total {{$tracks->count()}} Track  <strong>“You're Learning In This Tracks”</strong></h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @forelse($tracks as $track)
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card mb-4 card-hover">
                                            <div class="d-flex justify-content-between align-items-center p-4">
                                                <div class="d-flex">
                                                    <a href="{{route('track_courses',$track->name)}}">
                                                        <!-- Img -->
                                                        <img src="{{URL::asset('website/assets/images/path/path-gatsby.jpg')}}" alt="{{$track->name}}" class="avatar-md" /></a>
                                                    <div class="ms-3">
                                                        <h4 class="mb-1">
                                                            <a href="{{route('track_courses',$track->name)}}" class="text-inherit">
                                                                {{$track->name}}
                                                            </a>
                                                        </h4>
                                                        <p class="mb-0 fs-6">
                                                          <span class="me-2"><span class="text-dark fw-medium"> {{$track->courses->count()}} </span> Courses </span><span><span class="text-dark fw-medium">11 </span>Hours</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center mt-5">
                                            <p>Oops ! You are not Enroll to any Tracks </p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('footer')
    @include('layouts.webiste.footers.sub_footer')
@endsection

@section('js')

@endsection

