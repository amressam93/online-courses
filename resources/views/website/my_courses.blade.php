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
                        <li class="nav-item ms-0" role="presentation">
                            <a class="nav-link active " id="bookmarked-tab" data-bs-toggle="pill" href="#bookmarked" role="tab"
                               aria-controls="bookmarked" aria-selected="true">Bookmarked </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="currentlyLearning-tab" data-bs-toggle="pill" href="#currentlyLearning" role="tab"
                               aria-controls="currentlyLearning" aria-selected="false">My Courses</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="path-tab" data-bs-toggle="pill" href="#path" role="tab" aria-controls="path"
                               aria-selected="false">
                                Path</a>
                        </li>
                    </ul>
                    <!-- Tab content -->
                    <div class="tab-content" id="tabContent">

                        <!--Bookmark-->
                        <div class="tab-pane fade show active" id="bookmarked" role="tabpanel" aria-labelledby="bookmarked-tab">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card  mb-4 card-hover">
                                        <a href="#" class="card-img-top"><img src="../assets/images/course/course-react.jpg" alt=""
                                                                              class="card-img-top rounded-top-md"></a>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">How to easily create a
                                                    website with React</a>
                                            </h3>
                                            <!-- List inline -->
                                            <ul class="mb-3  list-inline">
                                                <li class="list-inline-item"><i class="far fa-clock me-1"></i>3h 56m
                                                </li>
                                                <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                                                  fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                                                        </rect>
                                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
                                                        </rect>
                                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                                        </rect>
                                                    </svg>Beginner </li>
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
                                                <span class="fs-6 text-muted">(9,300)</span>
                                            </div>
                                        </div>
                                        <!-- Card footer -->
                                        <div class="card-footer">
                                            <div class="row align-items-center g-0">
                                                <div class="col-auto">
                                                    <img src="../assets/images/avatar/avatar-3.jpg" class="rounded-circle avatar-xs" alt="">
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card  mb-4 card-hover">
                                        <a href="#" class="card-img-top"><img src="../assets/images/course/course-graphql.jpg" alt=""
                                                                              class="card-img-top rounded-top-md"></a>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">GraphQL: introduction
                                                    to graphQL for
                                                    beginners</a></h3>
                                            <!-- List inline -->
                                            <ul class="mb-3 list-inline">
                                                <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 46m
                                                </li>
                                                <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                                                  fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                                                        </rect>
                                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE">
                                                        </rect>
                                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE">
                                                        </rect>
                                                    </svg>Advance </li>
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
                                                <span class="fs-6 text-muted">(7,800)</span>
                                            </div>
                                        </div>
                                        <!-- Card footer -->
                                        <div class="card-footer">
                                            <div class="row align-items-center g-0">
                                                <div class="col-auto">
                                                    <img src="../assets/images/avatar/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
                                                </div>
                                                <div class="col ms-2">
                                                    <span>Ted Hawkins</span>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="removeBookmark">
                                                        <i class="fas fa-bookmark"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card  mb-4 card-hover">
                                        <a href="#" class="card-img-top"><img src="../assets/images/course/course-angular.jpg" alt=""
                                                                              class="card-img-top rounded-top-md"></a>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">Angular - the complete
                                                    guide for beginner</a>
                                            </h3>
                                            <!-- List inline -->
                                            <ul class="mb-3 list-inline">
                                                <li class="list-inline-item"><i class="far fa-clock me-1"></i>1h 30m
                                                </li>
                                                <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                                                  fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                                                        </rect>
                                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
                                                        </rect>
                                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                                        </rect>
                                                    </svg>Beginner </li>
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
                                                <span class="fs-6 text-muted">(8,245)</span>
                                            </div>
                                        </div>
                                        <!-- Card footer -->
                                        <div class="card-footer">
                                            <div class="row align-items-center g-0">
                                                <div class="col-auto">
                                                    <img src="../assets/images/avatar/avatar-4.jpg" class="rounded-circle avatar-xs" alt="">
                                                </div>
                                                <div class="col ms-2">
                                                    <span>Juanita Bell</span>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="removeBookmark">
                                                        <i class="fas fa-bookmark"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card  mb-4 card-hover">
                                        <a href="#" class="card-img-top"><img src="../assets/images/course/course-python.jpg" alt=""
                                                                              class="card-img-top rounded-top-md"></a>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">The Python Course:
                                                    build web application</a>
                                            </h3>
                                            <!-- List inline -->
                                            <ul class="mb-3  list-inline">
                                                <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 30m
                                                </li>
                                                <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                                                  fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                                                        </rect>
                                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE">
                                                        </rect>
                                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                                        </rect>
                                                    </svg>Intermediate </li>
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
                                                <span class="fs-6 text-muted">(3,245)</span>
                                            </div>
                                        </div>
                                        <!-- Card Footer -->
                                        <div class="card-footer">
                                            <div class="row align-items-center g-0">
                                                <div class="col-auto">
                                                    <img src="../assets/images/avatar/avatar-5.jpg" class="rounded-circle avatar-xs" alt="">
                                                </div>
                                                <div class="col ms-2">
                                                    <span>Claire Robertson</span>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="removeBookmark">
                                                        <i class="fas fa-bookmark"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card  mb-4 card-hover">
                                        <a href="#" class="card-img-top"><img src="../assets/images/course/course-gatsby.jpg" alt=""
                                                                              class="card-img-top rounded-top-md"></a>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">Gatsby JS: build blog
                                                    with GraphQL and
                                                    React</a></h3>
                                            <!-- List inline -->
                                            <ul class="mb-3  list-inline">
                                                <li class="list-inline-item"><i class="far fa-clock me-1"></i>3h 56m
                                                </li>
                                                <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                                                  fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                                                    </svg>Beginner </li>
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
                                                <span class="fs-6 text-muted">(5,300)</span>
                                            </div>
                                        </div>
                                        <!-- Card Footer -->
                                        <div class="card-footer">
                                            <div class="row align-items-center g-0">
                                                <div class="col-auto">
                                                    <img src="../assets/images/avatar/avatar-5.jpg" class="rounded-circle avatar-xs" alt="">
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card mb-4 card-hover">
                                        <a href="#" class="card-img-top"><img src="../assets/images/course/course-javascript.jpg" alt=""
                                                                              class="card-img-top rounded-top-md"></a>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">JavaScript: modern
                                                    javaScript from the
                                                    beginning</a></h3>
                                            <!-- List inline -->
                                            <ul class="mb-3 list-inline">
                                                <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 46m
                                                </li>
                                                <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                                                  fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE" />
                                                    </svg>Advance </li>
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
                                                <span class="fs-6 text-muted">(9,300)</span>
                                            </div>
                                        </div>
                                        <!-- Card Footer -->
                                        <div class="card-footer">
                                            <div class="row align-items-center g-0">
                                                <div class="col-auto">
                                                    <img src="../assets/images/avatar/avatar-6.jpg" class="rounded-circle avatar-xs" alt="">
                                                </div>
                                                <div class="col ms-2">
                                                    <span>Ted Hawkins</span>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="removeBookmark">
                                                        <i class="fas fa-bookmark"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card  mb-4 card-hover">
                                        <a href="#" class="card-img-top"><img src="../assets/images/course/course-css.jpg" alt=""
                                                                              class="card-img-top rounded-top-md"></a>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">CSS: ultimate CSS
                                                    course from beginner to
                                                    advanced</a></h3>
                                            <!-- List inline -->
                                            <ul class="mb-3  list-inline">
                                                <li class="list-inline-item"><i class="far fa-clock me-1"></i>1h 30m
                                                </li>
                                                <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                                                  fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                                                    </svg>Beginner </li>
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
                                                <span class="fs-6 text-muted">(5,568)</span>
                                            </div>
                                        </div>
                                        <!-- Card Footer -->
                                        <div class="card-footer">
                                            <div class="row align-items-center g-0">
                                                <div class="col-auto">
                                                    <img src="../assets/images/avatar/avatar-7.jpg" class="rounded-circle avatar-xs" alt="">
                                                </div>
                                                <div class="col ms-2">
                                                    <span>Juanita Bell</span>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="removeBookmark">
                                                        <i class="fas fa-bookmark"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12">
                                    <!-- Card -->
                                    <div class="card  mb-4 card-hover">
                                        <a href="#" class="card-img-top"><img src="../assets/images/course/course-wordpress.jpg" alt=""
                                                                              class="card-img-top rounded-top-md"></a>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit">Wordpress: complete
                                                    WordPress theme & plugin
                                                    dvelopment course</a></h3>
                                            <!-- List inline -->
                                            <ul class="mb-3 list-inline">
                                                <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 30m
                                                </li>
                                                <li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                                                  fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                                                    </svg>Intermediate </li>
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
                                                <span class="fs-6 text-muted">(6,245)</span>
                                            </div>
                                        </div>
                                        <!-- Card footer -->
                                        <div class="card-footer">
                                            <div class="row align-items-center g-0">
                                                <div class="col-auto">
                                                    <img src="../assets/images/avatar/avatar-8.jpg" class="rounded-circle avatar-xs" alt="">
                                                </div>
                                                <div class="col ms-2">
                                                    <span>Claire Robertson</span>
                                                </div>
                                                <div class="col-auto">
                                                    <a href="#" class="removeBookmark">
                                                        <i class="fas fa-bookmark"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center mt-5">
                                    <p>You’ve reached the end of the list</p>
                                </div>
                            </div>
                        </div>
                        <!--My courses-->
                        <div class="tab-pane fade" id="currentlyLearning" role="tabpanel" aria-labelledby="currentlyLearning-tab">
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
                            <div class="row">
                                <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center mt-5">
                                    <p>You’ve reached the end of the list</p>
                                </div>
                            </div>
                        </div>
                        <!--Path-->
                        <div class="tab-pane fade" id="path" role="tabpanel" aria-labelledby="path-tab">
                            <div class="row  d-flex justify-content-center text-center">
                                <div class="col-xl-5 col-lg-5 col-md-12 col-12">
                                    <div class="py-6">
                                        <img src="{{URL::asset('website/assets/images/svg/path-img.svg')}}" alt="" class="img-fluid">
                                        <div class="mt-4 ">
                                            <h2 class="display-4 fw-bold">Coming Soon</h2>
                                            <p class="mb-5">The designer working on our design so for now we schedule it
                                                to come soon.
                                                we release it soon for you. Thank you for watching.</p>
                                            <a href="../index-2.html" class="btn btn-primary">
                                                Back To Dashboard
                                            </a>
                                        </div>
                                    </div>
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

