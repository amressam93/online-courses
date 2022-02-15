<!-- guest navbar login -->
<nav class="navbar navbar-expand-lg navbar-default">
    <div class="container-fluid px-0">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{URL::asset('website/assets/images/brand/logo/LearnCode3.png')}}" alt=""/></a>

        <!-- Button -->
        <button
            class="navbar-toggler collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar-default"
            aria-controls="navbar-default"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="icon-bar top-bar mt-0"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="{{route('all_tracks')}}"
                        id="navbarBrowse"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        data-display="static"
                    >
                        Browse Track
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-arrow"
                        aria-labelledby="navbarBrowse"
                    >

                        @foreach(\App\track::all() as $track)
                        <li>
                            <a
                                href="{{route('track_courses',$track->name)}}"
                                class="dropdown-item"
                            >
                                {{$track->name}} <small><em>({{$track->courses->count()}}) course</em></small>
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </li>

            </ul>
            <form method="get" action="{{route('course_search')}}" class="mt-3 mt-lg-0 ms-lg-3 d-flex align-items-center">
				<span class="position-absolute ps-3 search-icon">
					<i class="fe fe-search"></i>
				</span>
                <input
                    type="search"
                    name="q"
                    class="form-control ps-6"
                    placeholder="Search Courses"
                />
            </form>
            <div class="ms-auto mt-3 mt-lg-0">
                <a href="{{route('login')}}" class="btn btn-white shadow-sm me-1">Sign In</a>
                <a href="{{route('register')}}" class="btn btn-primary">Sign Up</a>
            </div>
        </div>
    </div>
</nav>
