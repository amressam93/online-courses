<!-- auth Navbar -->
<nav class="navbar navbar-expand-lg navbar-default">
    <div class="container-fluid px-0">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{URL::asset('website/assets/images/brand/logo/LearnCode3.png')}}" alt=""/></a>
        <!-- Mobile view nav wrap -->
        <ul class="navbar-nav navbar-right-wrap ms-auto d-lg-none d-flex nav-top-wrap">

            <li class="dropdown ms-2">
                <a
                    class="rounded-circle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                >
                    <div class="avatar avatar-md avatar-indicators avatar-online">
                        @if(auth()->user()->photo)
                            <img alt="avatar" src="/images/{{auth()->user()->photo->filename}}" class="rounded-circle"/>
                        @else
                            <img alt="avatar" src="/images/cases/default_user.png" class="rounded-circle"/>
                        @endif
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                    <div class="dropdown-item">
                        <div class="d-flex">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                @if(auth()->user()->photo)
                                    <img alt="avatar" src="/images/{{auth()->user()->photo->filename}}" class="rounded-circle"/>
                                @else
                                    <img alt="avatar" src="/images/cases/default_user.png" class="rounded-circle"/>
                                @endif
                            </div>
                            <div class="ms-3 lh-1">
                                <h5 class="mb-1">{{auth()->user()->name}}</h5>
                                <p class="mb-0 text-muted">{{auth()->user()->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        @if(auth()->user()->admin == 0)
                        <li>
                            <a class="dropdown-item" href="{{route('profile')}}">
                                <i class="fas fa-user me-2"></i>Profile
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{route('my-courses')}}">
                                <i class="fas fa-chalkboard-teacher me-2"></i>My Courses
                            </a>
                        </li>

                        @elseif(auth()->user()->admin == 1)

                        <li>
                            <a class="dropdown-item" href="{{url('/admin/dashboard')}}">
                                <i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard
                            </a>
                        </li>

                        @endif
                    </ul>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" onclick="$('#logout-form').submit();">
                                <i class="fe fe-power me-2"></i>Sign Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
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
                        data-bs-display="static"
                    >
                        Browse Track
                    </a>
                    <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarBrowse">
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
                <input type="search" name="q" class="form-control ps-6 search-form-courses" placeholder="Search Courses"/>
            </form>
            <ul class="navbar-nav navbar-right-wrap ms-auto d-none d-lg-block">
                <li class="dropdown ms-2 d-inline-block">
                    <a class="rounded-circle" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <div class="avatar avatar-md avatar-indicators avatar-online">
                            @if(auth()->user()->photo)
                            <img alt="avatar" src="/images/{{auth()->user()->photo->filename}}" class="rounded-circle"/>
                            @else
                            <img alt="avatar" src="/images/cases/default_user.png" class="rounded-circle"/>
                            @endif
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-item">
                            <div class="d-flex">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    @if(auth()->user()->photo)
                                        <img alt="avatar" src="/images/{{auth()->user()->photo->filename}}" class="rounded-circle"/>
                                    @else
                                        <img alt="avatar" src="/images/cases/default_user.png" class="rounded-circle"/>
                                    @endif
                                </div>
                                <div class="ms-3 lh-1">
                                    <h5 class="mb-1">{{auth()->user()->name}}</h5>
                                    <p class="mb-0 text-muted">{{auth()->user()->email}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">
                            @if(auth()->user()->admin == 0)
                            <li>
                                <a
                                    class="dropdown-item" href="{{route('profile')}}">
                                    <i class="fas fa-user me-2"></i>Profile
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{route('my-courses')}}">
                                    <i class="fas fa-chalkboard-teacher me-2"></i>My Courses
                                </a>
                            </li>

                            @elseif(auth()->user()->admin == 1)

                            <li>
                                <a class="dropdown-item" href="{{url('/admin/dashboard')}}">
                                    <i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard
                                </a>
                            </li>

                            @endif
                        </ul>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="$('#logout-form').submit();">
                                    <i class="fe fe-power me-2"></i>Sign Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

