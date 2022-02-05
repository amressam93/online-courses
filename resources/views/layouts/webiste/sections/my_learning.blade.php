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
                        <div class="card  mb-4 card-hover equal_height_slider">
                            <a href="{{route('single_course',['slug' => $userCourse->slug, 'id' => $userCourse->id])}}" class="card-img-top">
                                @if($userCourse->photo)
                                    <img src="/images/{{$userCourse->photo->filename}}" alt="" class="card-img-top rounded-top-md">
                                @else
                                    <img src="/images/cases/no_image_found.jpg" alt="" class="card-img-top rounded-top-md">
                                @endif
                            </a>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="mb-2 text-truncate-line-2 equal_height_slider">
                                    <a href="{{route('single_course',['slug' => $userCourse->slug, 'id' => $userCourse->id])}}" class="text-inherit">{{$userCourse->title}}</a>
                                </h4>
                                <p class="mb-2 fs-6"><strong class="badge bg-secondary">Track: </strong> <a href="/tracks/{{$userCourse->track->name}}" style="color:#a8a3b9"> {{$userCourse->track->name}} </a></p>

                                <!-- List -->
                                <ul class="mb-3 list-inline">
                                    <li class="list-inline-item"><i class="far fa-clock me-1"></i>2h 30m</li>
                                    @if($userCourse->level->name == "Beginner")
                                        <li class="list-inline-item">
                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16"
                                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                                                </rect>
                                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
                                                </rect>
                                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                                </rect>
                                            </svg>{{$userCourse->level->name}}
                                        </li>
                                    @elseif($userCourse->level->name == "Intermediate")

                                        <li class="list-inline-item">
                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                                            </svg> {{$userCourse->level->name}}
                                        </li>

                                    @elseif($userCourse->level->name == "Advance")
                                        <li class="list-inline-item">
                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE" />
                                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE" />
                                            </svg> {{$userCourse->level->name}}
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
                                    <span class="fs-6 text-muted">({{count($userCourse->users)}}) Enrolled</span>
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
                                            <i class="fe fe-bookmark"></i>
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
