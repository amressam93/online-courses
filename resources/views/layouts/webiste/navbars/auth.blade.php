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
                        href="#"
                        id="navbarBrowse"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        data-bs-display="static"
                    >
                        Browse
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-arrow"
                        aria-labelledby="navbarBrowse"
                    >
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Web Development
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Bootstrap</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        React
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        GraphQl</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Gatsby</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Grunt</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Svelte</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Meteor</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        HTML5</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Angular</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Design
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Graphic Design</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Illustrator
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        UX / UI Design</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Figma Design</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Adobe XD</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Sketch</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Icon Design</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Photoshop</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a
                                href="pages/course-category.html"
                                class="dropdown-item"
                            >
                                Mobile App
                            </a>
                        </li>
                        <li>
                            <a
                                href="pages/course-category.html"
                                class="dropdown-item"
                            >
                                IT Software
                            </a>
                        </li>
                        <li>
                            <a
                                href="pages/course-category.html"
                                class="dropdown-item"
                            >
                                Marketing
                            </a>
                        </li>
                        <li>
                            <a
                                href="pages/course-category.html"
                                class="dropdown-item"
                            >
                                Music
                            </a>
                        </li>
                        <li>
                            <a
                                href="pages/course-category.html"
                                class="dropdown-item"
                            >
                                Life Style
                            </a>
                        </li>
                        <li>
                            <a
                                href="pages/course-category.html"
                                class="dropdown-item"
                            >
                                Business
                            </a>
                        </li>
                        <li>
                            <a
                                href="pages/course-category.html"
                                class="dropdown-item"
                            >
                                Photography
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarLanding"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Landings
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarLanding">
                        <li>
                            <h4 class="dropdown-header">Landings</h4>
                        </li>
                        <li>
                            <a
                                href="pages/landings/landing-courses.html"
                                class="dropdown-item"
                            >
                                Courses
                            </a>
                        </li>
                        <li>
                            <a
                                href="pages/landings/course-lead.html"
                                class="dropdown-item"
                            >
                                Lead Course
                            </a>
                        </li>
                        <li>
                            <a
                                href="pages/landings/request-access.html"
                                class="dropdown-item"
                            >
                                Request Access
                            </a>
                        </li>
                        <li>
                            <a href="pages/landings/landing-sass.html" class="dropdown-item">
                                SaaS
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarPages"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Pages
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-arrow"
                        aria-labelledby="navbarPages"
                    >
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#!"
                            >
                                Courses
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-single.html"
                                    >
                                        Course Single
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-single-v2.html"
                                    >
                                        Course Single v2
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-resume.html"
                                    >
                                        Course Resume
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Course Category
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-checkout.html"
                                    >
                                        Course Checkout
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-filter-list.html"
                                    >
                                        Course List/Grid
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages/add-course.html">
                                        Add New Course
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#!"
                            >
                                Paths
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        href="pages/course-path.html"
                                        class="dropdown-item"
                                    >
                                        Browse Path
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="pages/course-path-single.html"
                                        class="dropdown-item"
                                    >
                                        Path Single
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#!"
                            >
                                Blog
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="pages/blog.html">
                                        Listing</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/blog-single.html"
                                    >
                                        Article
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/blog-category.html"
                                    >
                                        Category</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/blog-sidebar.html"
                                    >
                                        Sidebar</a
                                    >
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#!"
                            >
                                Career
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="pages/career.html">
                                        Overview</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/career-list.html"
                                    >
                                        Listing
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/career-single.html"
                                    >
                                        Opening</a
                                    >
                                </li>

                            </ul>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#!"
                            >
                                Specialty
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/coming-soon.html"
                                    >
                                        Coming Soon
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/404-error.html"
                                    >
                                        Error 404
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/maintenance-mode.html"
                                    >
                                        Maintenance Mode
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/terms-condition-page.html"
                                    >
                                        Terms & Conditions
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <hr class="mx-3" />
                        </li>


                        <li>
                            <a class="dropdown-item" href="pages/about.html">
                                About
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#!">
                                Help Center <span class="badge badge-success ms-1">Pro</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pages/pricing.html">
                                Pricing
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pages/compare-plan.html">
                                Compare Plan
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="pages/contact.html">
                                Contact
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarAccount"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        Accounts
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-arrow"
                        aria-labelledby="navbarAccount"
                    >
                        <li>
                            <h4 class="dropdown-header">Accounts</h4>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Instructor
                            </a>
                            <ul class="dropdown-menu">
                                <li class="text-wrap">
                                    <h5 class="dropdown-header text-dark">Instructor</h5>
                                    <p class="dropdown-text mb-0">
                                        Instructor dashboard for manage courses and earning.
                                    </p>
                                </li>
                                <li>
                                    <hr class="mx-3" />
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/dashboard-instructor.html"
                                    >
                                        Dashboard</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/instructor-profile.html"
                                    >
                                        Profile</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/instructor-courses.html"
                                    >
                                        My Courses
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/instructor-order.html"
                                    >
                                        Orders</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/instructor-reviews.html"
                                    >
                                        Reviews</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/instructor-students.html"
                                    >
                                        Students</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/instructor-payouts.html"
                                    >
                                        Payouts</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/instructor-earning.html"
                                    >
                                        Earning</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Students
                            </a>
                            <ul class="dropdown-menu">
                                <li class="text-wrap">
                                    <h5 class="dropdown-header text-dark">Students</h5>
                                    <p class="dropdown-text mb-0">
                                        Students dashboard to manage your courses and subscriptions.
                                    </p>
                                </li>
                                <li>
                                    <hr class="mx-3" />
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/dashboard-student.html"
                                    >
                                        Dashboard</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/student-subscriptions.html"
                                    >
                                        Subscriptions
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/payment-method.html"
                                    >
                                        Payments</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/billing-info.html"
                                    >
                                        Billing Info</a
                                    >
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages/invoice.html">
                                        Invoice</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/invoice-details.html"
                                    >
                                        Invoice Details</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/dashboard-student.html"
                                    >
                                        Bookmarked</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/dashboard-student.html"
                                    >
                                        My Path</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Admin
                            </a>
                            <ul class="dropdown-menu">
                                <li class="text-wrap">
                                    <h5 class="dropdown-header text-dark">Master Admin</h5>
                                    <p class="dropdown-text mb-0">
                                        Master admin dashboard to manage courses, user, site setting
                                        , and work with amazing apps.
                                    </p>
                                </li>
                                <li>
                                    <hr class="mx-3" />
                                </li>
                                <li class="px-3 d-grid">
                                    <a
                                        href="pages/dashboard/admin-dashboard.html"
                                        class="btn btn-sm btn-primary"
                                    >Go to Dashboard</a
                                    >
                                </li>
                            </ul>
                        </li>
                        <li>
                            <hr class="mx-3" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="pages/sign-in.html">
                                Sign In
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pages/sign-up.html">
                                Sign Up
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="pages/forget-password.html"
                            >
                                Forgot Password
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pages/profile-edit.html">
                                Edit Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="pages/security.html">
                                Security
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="pages/social-profile.html"
                            >
                                Social Profiles
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="pages/notifications.html"
                            >
                                Notifications
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="pages/profile-privacy.html"
                            >
                                Privacy Settings
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="pages/delete-profile.html"
                            >
                                Delete Profile
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="pages/linked-accounts.html"
                            >
                                Linked Accounts
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <i class="fe fe-more-horizontal fs-3"></i>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-md"
                        aria-labelledby="navbarDropdown"
                    >
                        <div class="list-group">
                            <a
                                class="list-group-item list-group-item-action border-0"
                                href="docs/index.html"
                            >
                                <div class="d-flex align-items-center">
                                    <i class="fe fe-file-text fs-3 text-primary"></i>
                                    <div class="ms-3">
                                        <h5 class="mb-0">Documentations</h5>
                                        <p class="mb-0 fs-6">
                                            Browse the all documentation
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a
                                class="list-group-item list-group-item-action border-0"
                                href="docs/changelog.html"
                            >
                                <div class="d-flex align-items-center">
                                    <i class="fe fe-layers fs-3 text-primary"></i>
                                    <div class="ms-3">
                                        <h5 class="mb-0">
                                            Changelog <span class="text-primary ms-1">v2.2.1</span>
                                        </h5>
                                        <p class="mb-0 fs-6">See what's new</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
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

