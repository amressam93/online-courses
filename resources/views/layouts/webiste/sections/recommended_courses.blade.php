<div class="pb-lg-3 pt-lg-3">
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h2 class="mb-0 fw-bold" style="">Recommended Courses for you</h2>
            </div>
        </div>
        <div class="position-relative">
            <ul class="controls " id="sliderSecondControls">
                <li class="prev">
                    <i class="fe fe-chevron-left"></i>
                </li>
                <li class="next">
                    <i class="fe fe-chevron-right"></i>
                </li>
            </ul>
            <div class="sliderSecond">
                @foreach($recommended_courses as $course)
                <div class="item">
                    <!-- Card -->
                    <div class="card  mb-4 card-hover equal_height_slider">
                        <a href="{{route('single_course',['slug' => $course->slug, 'id' => $course->id])}}" class="card-img-top equal_height_slider">
                            @if($course->photo)
                                <img src="/images/{{$course->photo->filename}}" alt="" class="card-img-top rounded-top-md">
                            @else
                                <img src="/images/cases/no_image_found.jpg" alt="" class="card-img-top rounded-top-md">
                            @endif
                        </a>
                        <!-- Card Body -->
                        <div class="card-body">
                            <h4 class="mb-2 text-truncate-line-2 equal_height_slider">
                                <a href="{{route('single_course',['slug' => $course->slug, 'id' => $course->id])}}" class="text-inherit">{{$course->title}}</a>
                            </h4>
                            <p class="mb-2 fs-6"><strong class="badge bg-secondary">Track: </strong> <a href="/tracks/{{$course->track->name}}" style="color:#a8a3b9"> {{$course->track->name}} </a></p>
                            <!-- List -->
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
                        <!-- Card Footer -->
                        <div class="card-footer">
                            <div class="row align-items-center g-0">
                                <div class="col-auto">
                                    <img src="{{URL::asset('website/assets/images/avatar/avatar-5.jpg')}}" class="rounded-circle avatar-xs" alt="">
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
