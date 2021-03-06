@extends('layouts.webiste.master')

@section('title') {{$course->title}} | LearnCode @endsection

@section('css')

@endsection

@section('content')



    <!-- Page header -->
    <div class="pt-lg-8 pb-lg-16 pt-8 pb-12 bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div>
                        <h1 class="text-white display-4 fw-semi-bold">{{$course->title}}</h1>
                        <p class="text-white mb-6 lead">
                            {{$course->description}}
                        </p>
                        <div class="d-flex align-items-center">
                            <a href="/tracks/{{$course->track->name}}" class="bookmark text-white text-decoration-none">
                                <i class="fe fe-bookmark text-white-50 me-2"></i>{{$course->track->name}}
                            </a>

                            <span class="text-white ms-3"><i class="fe fe-user text-white-50"></i> {{count($course->users)}} Enrolled </span>
                            <span class="ms-4">
                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                <i class="mdi mdi-star me-n1-half text-warning"></i>
                                <span class="text-white">(140)</span>
                            </span>

                            @if($course->level->name == "Beginner")
                            <span class="text-white ms-4 d-none d-md-block">
                              <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                   fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#DBD8E9">
                                                        </rect>
                                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE">
                                                        </rect>
                                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE">
                                                        </rect>
                                                    </svg>
                                <span class="align-middle">
                                  {{$course->level->name}}
                                </span>
                            </span>

                            @elseif($course->level->name == "Intermediate")
                                <span class="text-white ms-4 d-none d-md-block">
                                  <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="3" y="8" width="2" height="6" rx="1" fill="#DBD8E9" />
                                                            <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                                                            <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE" />
                                                        </svg>
                                <span class="align-middle">
                                  {{$course->level->name}}
                                </span>
                            </span>
                            @elseif($course->level->name == "Advance")
                                <span class="text-white ms-4 d-none d-md-block">
                                <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="3" y="8" width="2" height="6" rx="1" fill="#DBD8E9" />
                                                            <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                                                            <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                                                        </svg>
                                <span class="align-middle">
                                  {{$course->level->name}}
                                </span>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                    <!-- Card -->
                    <div class="card rounded-3">



                        <!-- Card header -->
                        <div class="card-header border-bottom-0 p-0">
                            <div>
                                <!-- Nav -->
                                <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="table-tab" data-bs-toggle="pill" href="#table" role="tab" aria-controls="table" aria-selected="true">Contents</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="description-tab" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="review-tab" data-bs-toggle="pill" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="transcript-tab" data-bs-toggle="pill" href="#transcript" role="tab" aria-controls="transcript" aria-selected="false">Transcript</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="faq-tab" data-bs-toggle="pill" href="#faq" role="tab" aria-controls="faq" aria-selected="false">FAQ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">

                                     @include('flash-message')

                                    <!-- Card -->
                                    <div class="accordion" id="courseAccordion">
                                        <div>
                                            <!-- List group -->
                                            <ul class="list-group list-group-flush">
                                                @if(count($course->videos) > 0)
                                                    @foreach($course->videos as $video)
                                                       <li class="list-group-item px-0">
                                                    <!-- Toggle -->
                                                    <a class="h4 mb-0 d-flex align-items-center text-inherit text-decoration-none" data-bs-toggle="collapse" href="#video_{{$video->id}}" aria-expanded="false" aria-controls="video_{{$video->id}}">
                                                        <div class="me-auto">
                                                            <!-- Title -->
                                                            {{$video->title}}
                                                        </div>
                                                        <!-- Chevron -->
                                                        <span class="chevron-arrow ms-4">
                                                          <i class="fe fe-chevron-down fs-4"></i>
                                                        </span>
                                                    </a>
                                                    <!-- Row -->
                                                    <!-- Collapse -->
                                                    <div class="collapse {{$loop->first ? 'show' : ''}}" id="video_{{$video->id}}" data-bs-parent="#courseAccordion">
                                                        <div class="pt-3 pb-2">
                                                            <a href="{{route('course_lessons',['slug' => $course->slug , 'courseId' => $course->id])}}" class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                <div class="text-truncate">
                                                                    <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i
                                                                            class="mdi mdi-play fs-4"></i></span>
                                                                    <span>{{$video->title}}</span>
                                                                </div>
                                                                <div class="text-truncate">
                                                                    <span>1m 41s</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </li>
                                                    @endforeach
                                                @else
                                                    <div class="alert alert-danger">This Course does Not Include any Videos</div>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <!-- Description -->
                                    <div class="mb-4">
                                        <h3 class="mb-2">Course Descriptions</h3>
                                        <p>
                                            If you???re learning to program for the first time, or if you???re coming from a different language, this course, JavaScript: Getting Started, will give you the basics for coding in JavaScript. First, you'll discover the types of applications that can be
                                            built with JavaScript, and the platforms they???ll run on.
                                        </p>
                                        <p>
                                            Next, you???ll explore the basics of the language, giving plenty of examples. Lastly, you???ll put your JavaScript knowledge to work and modify a modern, responsive web page. When you???re finished with this course, you???ll have the skills and knowledge in JavaScript
                                            to create simple programs, create simple web applications, and modify web pages.
                                        </p>
                                    </div>
                                    <h4 class="mb-3">What you???ll learn</h4>
                                    <div class="row mb-3">
                                        <div class="col-12 col-md-6">
                                            <ul class="list-unstyled">
                                                <li class="d-flex mb-2">
                                                    <i class="far fa-check-circle text-success me-2 mt-2"></i>
                                                    <span>Recognize the importance of understanding your objectives when addressing an
                            audience.</span>
                                                </li>
                                                <li class="d-flex mb-2">
                                                    <i class="far fa-check-circle text-success me-2 mt-2"></i>
                                                    <span>Identify the fundaments of composing a successful close.</span>
                                                </li>
                                                <li class="d-flex mb-2">
                                                    <i class="far fa-check-circle text-success me-2 mt-2"></i>
                                                    <span>Explore how to connect with your audience through crafting compelling stories.</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <ul class="list-unstyled">
                                                <li class="d-flex mb-2">
                                                    <i class="far fa-check-circle text-success me-2 mt-2"></i>
                                                    <span>Examine ways to connect with your audience by personalizing your content.</span>
                                                </li>
                                                <li class="d-flex mb-2">
                                                    <i class="far fa-check-circle text-success me-2 mt-2"></i>
                                                    <span>Break down the best ways to exude executive presence.</span>
                                                </li>
                                                <li class="d-flex mb-2">
                                                    <i class="far fa-check-circle text-success me-2 mt-2"></i>
                                                    <span>Explore how to communicate the unknown in an impromptu communication.</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <p>Maecenas viverra condimentum nulla molestie condimentum. Nunc ex libero, feugiat quis lectus vel, ornare euismod ligula. Aenean sit amet arcu nulla.</p>
                                    <p>Duis facilisis ex a urna blandit ultricies. Nullam sagittis ligula non eros semper, nec mattis odio ullamcorper. Phasellus feugiat sit amet leo eget consectetur.</p>
                                </div>
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <!-- Reviews -->
                                    <div class="mb-3">
                                        <h3 class="mb-4">How students rated this courses</h3>
                                        <div class="row align-items-center">
                                            <div class="col-auto text-center">
                                                <h3 class="display-2 fw-bold">4.5</h3>
                                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1-half text-warning"></i>
                                                <p class="mb-0 fs-6">(Based on 27 reviews)</p>
                                            </div>
                                            <!-- Progress bar -->
                                            <div class="col pt-3 order-3 order-md-2">
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-0" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-6 order-2 order-md-3">
                                                <!-- Rating -->
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <span class="ms-1">53%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">36%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">9%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">3%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">2%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- hr -->
                                    <hr class="my-5" />
                                    <div class="mb-3">
                                        <div class="d-lg-flex align-items-center justify-content-between mb-5">
                                            <!-- Reviews -->
                                            <div class="mb-3 mb-lg-0">
                                                <h3 class="mb-0">Reviews</h3>
                                            </div>
                                            <div>
                                                <!-- Form -->
                                                <form class="form-inline">
                                                    <div class="d-flex align-items-center me-2">
                                                        <span class="position-absolute ps-3">
                              <i class="fe fe-search"></i>
                            </span>
                                                        <input type="search" class="form-control ps-6" placeholder="Search Review" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Rating -->
                                        <div class="d-flex border-bottom pb-4 mb-4">
                                            <img src="../assets/images/avatar/avatar-2.jpg" alt="" class="rounded-circle avatar-lg" />
                                            <div class=" ms-3">
                                                <h4 class="mb-1">
                                                    Max Hawkins
                                                    <span class="ms-1 fs-6 text-muted">2 Days ago</span>
                                                </h4>
                                                <div class="fs-6 mb-2">
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                </div>
                                                <p>Lectures were at a really good pace and I never felt lost. The instructor was well informed and allowed me to learn and navigate Figma easily.</p>
                                                <div class="d-lg-flex">
                                                    <p class="mb-0">Was this review helpful?</p>
                                                    <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                                    <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Rating -->
                                        <div class="d-flex border-bottom pb-4 mb-4">
                                            <img src="../assets/images/avatar/avatar-3.jpg" alt="" class="rounded-circle avatar-lg" />
                                            <div class=" ms-3">
                                                <h4 class="mb-1">Arthur Williamson <span class="ms-1 fs-6 text-muted">3 Days ago</span>
                                                </h4>
                                                <div class="fs-6 mb-2">
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                </div>
                                                <p>Its pretty good.Just a reminder that there are also students with Windows, meaning Figma its a bit different of yours. Thank you!</p>
                                                <div class="d-lg-flex">
                                                    <p class="mb-0">Was this review helpful?</p>
                                                    <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                                    <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Rating -->
                                        <div class="d-flex border-bottom pb-4 mb-4">
                                            <img src="../assets/images/avatar/avatar-4.jpg" alt="" class="rounded-circle avatar-lg" />
                                            <div class=" ms-3">
                                                <h4 class="mb-1">Claire Jones <span class="ms-1 fs-6 text-muted">4 Days ago</span></h4>
                                                <div class="fs-6 mb-2">
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                </div>
                                                <p>
                                                    Great course for learning Figma, the only bad detail would be that some icons are not included in the assets. But 90% of the icons needed are included, and the voice of the instructor was very clear and easy to understood.
                                                </p>
                                                <div class="d-lg-flex">
                                                    <p class="mb-0">Was this review helpful?</p>
                                                    <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                                    <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Rating -->
                                        <div class="d-flex">
                                            <img src="../assets/images/avatar/avatar-5.jpg" alt="" class="rounded-circle avatar-lg" />
                                            <div class=" ms-3">
                                                <h4 class="mb-1">
                                                    Bessie Pena
                                                    <span class="ms-1 fs-6 text-muted">5 Days ago</span>
                                                </h4>
                                                <div class="fs-6 mb-2">
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                </div>
                                                <p>
                                                    I have really enjoyed this class and learned a lot, found it very inspiring and helpful, thank you!
                                                    <i class="em em-heart_eyes ms-2 fs-6"></i>
                                                </p>
                                                <div class="d-lg-flex">
                                                    <p class="mb-0">Was this review helpful?</p>
                                                    <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                                    <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="transcript" role="tabpanel" aria-labelledby="transcript-tab">
                                    <!-- Description -->
                                    <div>
                                        <h3 class="mb-3">Transcript from the "Introduction" Lesson</h3>
                                        <div class="mb-4">
                                            <h4>Course Overview <a href="#" class="text-primary ms-2 h4">[00:00:00]</a></h4>
                                            <p class="mb-0">
                                                My name is John Deo and I work as human duct tape at Gatsby, that means that I do a lot of different things. Everything from dev roll to writing content to writing code. And I used to work as an architect at IBM. I live in Portland, Oregon.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>Introduction <a href="#" class="text-primary ms-2 h4">[00:00:16]</a></h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>Why Take This Course? <a href="#" class="text-primary ms-2 h4">[00:00:37]</a></h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>A Look at the Demo Application <a href="#" class="text-primary ms-2 h4">[00:00:54]</a></h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>Summary <a href="#" class="text-primary ms-2 h4">[00:01:31]</a></h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tab pane -->
                                <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                    <!-- FAQ -->
                                    <div>
                                        <h3 class="mb-3">Course - Frequently Asked Questions</h3>
                                        <div class="mb-4">
                                            <h4>How this course help me to design layout?</h4>
                                            <p>
                                                My name is Jason Woo and I work as human duct tape at Gatsby, that means that I do a lot of different things. Everything from dev roll to writing content to writing code. And I used to work as an architect at IBM. I live in Portland, Oregon.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>What is important of this course?</h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>Why Take This Course?</h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>Is able to create application after this course?</h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 mt-lg-n22">
                    <!-- Card -->
                    <div class="card mb-3 mb-4">
                        <div class="p-1">
                            <div class="d-flex justify-content-center position-relative rounded py-10 border-white border rounded-3 bg-cover" style="{{$course->photo ? 'background-image: url(/images/'.$course->photo->filename.');' : 'background-image: url(/images/cases/no_image_found.jpg);'}}">
                                <a class="popup-youtube icon-shape rounded-circle btn-play icon-xl text-decoration-none" href="{{count($course->videos) > 0 ? 'https://www.youtube.com/watch?v='.$course->videos->first()->link : ''}}">
                                    <i class="fe fe-play"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Price single page -->
                            @if(\Auth::check())

                            <div class="mb-3">

                            @if(!in_array($course->id,auth()->user()->courses->pluck('id')->toArray()))

                                @if($course->status == 0)
                                    <h1><span class="fw-bold badge bg-success me-4">Free</span></h1>
                                @else
                                    <h1><span class="fw-bold badge bg-danger me-4">Paid</span></h1>
                                @endif

                            @endif

                            </div>

                            @else
                                @if($course->status == 0)
                                    <h1><span class="fw-bold badge bg-success me-4">Free</span></h1>
                                @else
                                    <h1><span class="fw-bold badge bg-danger me-4">Paid</span></h1>
                                @endif

                            @endif

                            @include('custom-flash-message')

                            <div class="d-grid">
                               @if(\Auth::check())
                                    @if(in_array($course->id,auth()->user()->courses->pluck('id')->toArray()))
                                       <a href="{{route('course_lessons',['slug' => $course->slug , 'courseId' => $course->id])}}" class="btn btn-dark mb-2">Go to course</a>
                                    @else
                                        <form method="POST" action="{{route('enroll_course',['slug' => $course->slug,'id' => $course->id])}}">
                                            @csrf
                                            <input type="submit" class="btn btn-primary mb-2 col-12" name="enroll" value="Enroll Now">
                                        </form>
                                    @endif
                                @else
                                    <form method="POST" action="{{route('enroll_course',['slug' => $course->slug,'id' => $course->id])}}">
                                        @csrf
                                        <input type="submit" class="btn btn-primary mb-2 col-12" name="enroll" value="Enroll Now">
                                    </form>
                                @endif

{{--                                <a href="#" class="btn btn-primary mb-2  ">Enroll Now</a>--}}
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card mb-4">
                        <div>
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">What???s included</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent"><i class="fe fe-play-circle align-middle me-2 text-primary"></i>12 hours video</li>
                                <li class="list-group-item bg-transparent"><i class="fe fe-award me-2 align-middle text-success"></i>Certificate</li>
                                <li class="list-group-item bg-transparent"><i class="fe fe-calendar align-middle me-2 text-info"></i>12 Article
                                </li>
                                <li class="list-group-item bg-transparent"><i class="fe fe-video align-middle me-2 text-secondary"></i>Watch Offline</li>
                                <li class="list-group-item bg-transparent border-bottom-0"><i class="fe fe-clock align-middle me-2 text-warning"></i>Lifetime access</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="position-relative">
                                    <img src="../assets/images/avatar/avatar-1.jpg" alt="" class="rounded-circle avatar-xl" />
                                    <a href="#" class="position-absolute mt-2 ms-n3" data-bs-toggle="tooltip" data-placement="top" title="Verifed">
                                        <img src="../assets/images/svg/checked-mark.svg" alt="" height="30" width="30" />
                                    </a>
                                </div>
                                <div class="ms-4">
                                    <h4 class="mb-0">Jenny Wilson</h4>
                                    <p class="mb-1 fs-6">Front-end Developer, Designer</p>
                                    <span class="fs-6"><span class="text-warning">4.5</span><span class="mdi mdi-star text-warning me-2"></span>Instructor Rating</span>
                                </div>
                            </div>
                            <div class="border-top row mt-3 border-bottom mb-3 g-0">
                                <div class="col">
                                    <div class="pe-1 ps-2 py-3">
                                        <h5 class="mb-0">11,604</h5>
                                        <span>Students</span>
                                    </div>
                                </div>
                                <div class="col border-start">
                                    <div class="pe-1 ps-3 py-3">
                                        <h5 class="mb-0">32</h5>
                                        <span>Courses</span>
                                    </div>
                                </div>
                                <div class="col border-start">
                                    <div class="pe-1 ps-3 py-3">
                                        <h5 class="mb-0">12,230</h5>
                                        <span>Reviews</span>
                                    </div>
                                </div>
                            </div>
                            <p>I am an Innovation designer focussing on UX/UI based in Berlin. As a creative resident at Figma explored the city of the future and how new technologies.</p>
                            <a href="instructor-profile.html" class="btn btn-outline-white btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card -->
            <div class="pt-12 pb-3">
                <div class="row d-md-flex align-items-center mb-4">
                    <div class="col-12">
                        <h2 class="mb-0">Related Courses</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card mb-4 card-hover">
                            <a href="course-single.html" class="card-img-top"><img src="../assets/images/course/course-react.jpg" alt="" class="card-img-top rounded-top-md" /></a>
                            <!-- Card body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="course-single.html" class="text-inherit">How to
                                        easily create a website with React</a></h4>
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
                                    <span class="fs-6 text-muted">(7,700)</span>
                                </div>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="../assets/images/avatar/avatar-1.jpg" class="rounded-circle avatar-xs" alt="" />
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
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card mb-4 card-hover">
                            <a href="course-single.html" class="card-img-top"><img src="../assets/images/course/course-graphql.jpg" alt="" class="card-img-top rounded-top-md" /></a>
                            <!-- Card body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="course-single.html" class="text-inherit">GraphQL:
                                        introduction to graphQL for beginners</a></h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 46m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                                            <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                                            <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE" />
                                        </svg> Advance
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
                                    <span class="fs-6 text-muted">(9,300)</span>
                                </div>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="../assets/images/avatar/avatar-2.jpg" class="rounded-circle avatar-xs" alt="" />
                                    </div>
                                    <div class="col ms-2">
                                        <span>Ted Hawkins</span>
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
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Card -->
                        <div class="card mb-4 card-hover">
                            <a href="course-single.html" class="card-img-top"><img src="../assets/images/course/course-angular.jpg" alt="" class="card-img-top rounded-top-md" /></a>
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="course-single.html" class="text-inherit">Angular -
                                        the complete guide for beginner</a></h4>
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>1h 30m</li>
                                    <li class="list-inline-item">
                                        <svg class="me-1 mt-n1" width="16" height="16" viewBox="0
                                    0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                    <span class="fs-6 text-muted">(8,890)</span>
                                </div>
                            </div>
                            <!-- Card footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="../assets/images/avatar/avatar-3.jpg" class="rounded-circle avatar-xs" alt="" />
                                    </div>
                                    <div class="col ms-2">
                                        <span>Juanita Bell</span>
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
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card mb-4 card-hover">
                            <a href="course-single.html" class="card-img-top"><img src="../assets/images/course/course-python.jpg" alt="" class="card-img-top rounded-top-md" /></a>
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2"><a href="course-single.html" class="text-inherit">The Python
                                        Course: build web application</a></h4>
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
                            <!-- Card footer -->
                            <div class="card-footer">
                                <div class="row align-items-center g-0">
                                    <div class="col-auto">
                                        <img src="../assets/images/avatar/avatar-4.jpg" class="rounded-circle avatar-xs" alt="" />
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
