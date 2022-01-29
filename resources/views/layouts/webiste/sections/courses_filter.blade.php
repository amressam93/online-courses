 <!-- Tab pane -->

    <div class="tab-pane fade show active pb-4 " id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
        <div class="row" id="courses_section_1">

            @foreach($results as $course)

                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Card -->
                    <div class="card  mb-4 card-hover equal_height_slider">
                        <a href="{{route('single_course',['slug' => $course->slug, 'id' => $course->id])}}" class="card-img-top equal_height_slider">
                            @if($course->photo)
                                <img src="/images/{{$course->photo->filename}}" alt="" class="card-img-top rounded-top-md">
                            @else
                                <img src="/images/cases/no_image_found.jpg" alt="" class="card-img-top rounded-top-md">
                            @endif
                        </a>
                        <!-- Card body -->
                        <div class="card-body">
                            <h4 class="mb-2 text-truncate-line-2 equal_height_slider">
                                <a href="{{route('single_course',['slug' => $course->slug, 'id' => $course->id])}}" class="text-inherit">{{$course->title}}</a>
                            </h4>
                            <!-- List inline -->
                            <ul class="mb-3 list-inline">
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
                                <br><br>
                                @if($course->status == 0)
                                    <span class="fw-bold h4 text-success">Free</span>
                                @else
                                    <span class="fw-bold h4 text-danger">Paid</span>
                                @endif
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer">
                            <!-- Row -->
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
    <!-- Tab pane -->
    <div class="tab-pane fade pb-4" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
        <!-- Card -->
        @foreach($results as $course)
            <div class="card mb-4 card-hover">
                <div class="row g-0">
                    <a class="col-12 col-md-12 col-xl-3 col-lg-3 bg-cover img-left-rounded" style="{{ $course->photo ? "background-image: url(/images/".$course->photo->filename.")" : "background-image: url(/images/cases/no_image_found.jpg);"}}" href="{{route('single_course',['slug' => $course->slug, 'id' => $course->id])}}">
                        @if($course->photo)
                            <img src="/images/{{$course->photo->filename}}" alt="..." class="img-fluid d-lg-none invisible">
                        @else
                            <img src="/images/cases/no_image_found.jpg" alt="..." class="img-fluid d-lg-none invisible">
                        @endif
                    </a>
                    <div class="col-lg-9 col-md-12 col-12">
                        <!-- Card body -->
                        <div class="card-body">
                            <h3 class="mb-2 text-truncate-line-2"><a href="{{route('single_course',['slug' => $course->slug, 'id' => $course->id])}}" class="text-inherit">{{$course->title}}</a></h3>
                            <!-- List inline -->
                            <ul class="mb-5 list-inline">
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
                                <li class="list-inline-item"> <span>
                                                <i class="mdi mdi-star text-warning me-n1"></i>
                                                <i class="mdi mdi-star text-warning me-n1"></i>
                                                <i class="mdi mdi-star text-warning me-n1"></i>
                                                <i class="mdi mdi-star text-warning me-n1"></i>
                                                <i class="mdi mdi-star text-warning"></i>
                                              </span>
                                    <span class="text-warning">4.5</span>
                                    <span class="fs-6 text-muted">({{count($course->users)}}) Enrolled</span></li>

                                @if($course->status == 0)
                                    <li class="list-inline-item"> <span class="fw-bold h4 text-success">Free</span> </li>
                                @else
                                    <li class="list-inline-item">   <span class="fw-bold h4 text-danger">Paid</span>  </li>
                                @endif



                            </ul>
                            <!-- Row -->
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
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    {{ $results->appends(Request::except('page'))->links('vendor.pagination.custom') }}




