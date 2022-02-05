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
                                    <a href="{{route('track_courses',$track->name)}}" class="text-inherit">
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
