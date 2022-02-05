@extends('layouts.webiste.master')

@section('title') Online Courses - Learn Anything, On Your Schedule | LearnCode @endsection

@section('css')
    <style>

        .lds-dual-ring.hidden {
            display: none;
        }

        .lds-dual-ring
        {
            position: fixed;
            z-index: 1;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            text-align:center;
            background: url({{URL::asset('website/assets/images/spinner/loader.gif')}}) no-repeat center;
        }
    </style>

@endsection

@section('content')

    <!-- Bg cover -->
    <div class="py-6" style="background: linear-gradient(270deg, #9D4EFF 0%, #782AF4 100%);">
    </div>
    <!-- Page header -->
    <div class="bg-white shadow-sm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="d-md-flex align-items-center justify-content-between bg-white  pt-3 pb-3 pb-lg-5">
                        <div class="d-md-flex align-items-center text-lg-start text-center ">
                            <div class="me-3  mt-n8">
                                <img src="{{URL::asset('website/assets/images/path/path-bootstrap.jpg')}}" class="avatar-xxl rounded border p-4 bg-white " alt="">
                            </div>
                            <div class="mt-3 mt-md-0">
                                <h1 class="mb-0 fw-bold me-3  ">{{$track->name}} </h1>
                            </div>
                            <div>
                                <span class="ms-2 fs-6"><span class="text-dark fw-medium"> {{$track->users->count()}} </span>students</span>
                                <span class="ms-2 fs-6"><span class="text-dark fw-medium"> {{$track->courses->count()}} </span> Courses </span>
                                <span class="ms-2 fs-6"><span class="text-dark fw-medium"> 11 </span> Hours </span>
                            </div>
                        </div>
                    </div>
                    <!-- Nav tab -->
                    @if($track->courses->count() > 0)
                        <ul class="nav nav-lt-tab" id="pills-tab" role="tablist">
                            <li class="nav-item ms-0" role="presentation">
                                <a class="nav-link active" id="pills-course-tab" data-bs-toggle="pill" href="#pills-course" role="tab"
                                   aria-controls="pills-course" aria-selected="true">Courses </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-about-tab" data-bs-toggle="pill" href="#pills-about" role="tab"
                                   aria-controls="pills-about" aria-selected="false">About</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-author-tab" data-bs-toggle="pill" href="#pills-author" role="tab"
                                   aria-controls="pills-author" aria-selected="false">Author</a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Content  -->


    @if($track->courses->count() > 0)
        <div class="py-6">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Tab content -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-course" role="tabpanel" aria-labelledby="pills-course-tab">
                                <!-- Tab pane -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-5">
                                            <h2 class="mb-1">{{$track->name}}</h2>
                                            <p>Learn <strong>{{$track->name}}</strong> tutorial for All Levels with there easy components and utility.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="pb-4 pt-8 pt-lg-0" id="position">
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-10 col-md-12 col-12">
                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <h4>Filter by:</h4>
                                                </div>
                                                <!-- select menu -->
                                                <div class="col-lg-6 col-md-6 col-12 mt-3 mt-lg-0">
                                                    <select class="selectpicker" multiple data-live-search="true" title="All Level"  id="levels" data-width="100%">
{{--                                                        <option selected value="">All Level</option>--}}
                                                        @foreach(\App\CourseLevel::all() as $level)
                                                            <option value="{{$level->id}}"> {{$level->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- select menu -->
                                                <div class="col-lg-6 col-md-6 col-12 mt-3 mt-lg-0">
                                                    <select class="selectpicker" multiple data-live-search="true" title="All Price" id="prices" data-width="100%">
{{--                                                        <option selected value="">All Price</option>--}}
                                                        <option value="0">Free</option>
                                                        <option value="1">Paid</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row" id="post_data">

                                    {{ csrf_field() }}


                                    <!--Spinner Loading-->
                                    <div id="loader" class="lds-dual-ring hidden overlay"></div>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <!-- Card -->
                                        <div class="card ">
                                            <div class="card-header">
                                                <h3 class="mb-0">About Path</h3>
                                            </div>
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <h2>Header Level 2</h2>
                                                <p>Quickly design and customize responsive mobile-first sites with
                                                    Bootstrap, the world’s most popular front-end open source toolkit,
                                                    featuring Sass variables and mixins, responsive grid system, extensive
                                                    prebuilt
                                                    components, and powerful JavaScript plugins. Lorem ipsum dolor sit amet
                                                    consectetur adipisicing elit. Possimus obcaecati sint dolore officiis
                                                    unde veritatis dignissimos iusto fugit officia? Atque ullam, saepe
                                                    tempora eum voluptates cum labore nisi mollitia quidem!</p>
                                                <p class="mb-4">Vestibulum nec porta tortor. Phasellus metus quam, semper ut
                                                    tincidunt sit amet, viverra quis neque. Nullam mattis mollis massa nec
                                                    pulvinar. Vivamus ut velit orci. Aenean nec pretium augue. In eu tellus
                                                    quis urna vestibulum pulvinar. Etiam in elementum lectus, id dignissim
                                                    mauris. Quisque tempus posuere aliquet.</p>
                                                <h3 class="mb-3">Header Level 3 </h3>
                                                <!-- Img -->
                                                <img src="{{URL::asset('website/assets/images/blog/blogpost-1.jpg')}}" alt="" class="img-fluid mb-5 w-100">
                                                <h4 class="mb-5">Header Level 4 </h4>
                                                <!-- Blockquote -->
                                                <blockquote class="blockquote-left ">
                                                    <p class="mb-4 font-italic ms-4">Blockquote. Lorem ipsum dolor sit amet,
                                                        consectetur adipiscing elit. Vivamus magna. Cras in mi at felis
                                                        aliquet congue. Ut a est eget ligula molestie gravida. Curabitur
                                                        massa. Donec eleifend, libero at sagittis mollis, tellus est
                                                        malesuada tellus, at luctus turpis elit sit amet quam. Vivamus
                                                        pretium ornare est</p>
                                                    <footer class="blockquote-footer ms-4">Andrew Watkins</footer>
                                                </blockquote>
                                                <ol>
                                                    <li>Lorem ipsum dolor sit amet</li>
                                                    <li>Consectetur adipiscing elit</li>
                                                    <li>Integer molestie lorem at massa</li>
                                                    <li>Facilisis in pretium nisl aliquet</li>
                                                </ol>
                                                <h5 class="mb-3 mt-4">Header Level 5 </h5>
                                                <ul>
                                                    <li>Phasellus iaculis neque</li>
                                                    <li>Purus sodales ultricies</li>
                                                    <li>Vestibulum laoreet porttitor sem</li>
                                                    <li>Ac tristique libero volutpat at</li>
                                                </ul>
                                                <h6 class="mb-3 mt-4">Header Level 6 </h6>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident,
                                                    maiores laboriosam necessitatibus eveniet suscipit ad accusamus nisi
                                                    dolores dolorum deserunt atque dicta libero doloribus veritatis enim
                                                    tempora! Laboriosam quasi quod sint incidunt neque? Perferendis tempore
                                                    neque molestias reiciendis consequuntur hic explicabo exercitationem
                                                    ipsum a esse? Sit soluta reiciendis sint molestiae!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab Pane -->
                            <div class="tab-pane fade" id="pills-author" role="tabpanel" aria-labelledby="pills-author-tab">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card  mb-4 ">
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <div class="d-lg-flex">
                                                    <div class="position-relative">
                                                        <img src="../assets/images/avatar/avatar-1.jpg" alt=""
                                                             class="rounded-circle avatar-xl mb-3 mb-lg-0 ">
                                                        <a href="#" class="position-absolute mt-2 ms-n3" data-bs-toggle="tooltip" data-placement="top"
                                                           title="" data-original-title="Verifed">
                                                            <img src="../assets/images/svg/checked-mark.svg" alt="" height="30" width="30">
                                                        </a>
                                                    </div>
                                                    <div class="ms-lg-4">
                                                        <h4 class="mb-0">Jenny Wilson</h4>
                                                        <p class="mb-0 fs-6">Front-end Developer, Designer</p>
                                                        <p class="fs-6 mb-1 text-warning"><span>4.5</span><span
                                                                class="mdi mdi-star text-warning me-2"></span>Instructor Rating</p>
                                                        <p class="fs-6 text-muted"><span class="me-2"><span
                                                                    class="text-dark fw-medium">42</span>
                              Courses</span><span class="ms-2"><span class="text-dark fw-medium">1,10,124
                              </span>
                              Students</span>
                                                        </p>
                                                        <p>I start my development and digital career studying digital
                                                            design. After taking a couple of programming classes I realize
                                                            that code is what I wanted to be doing. </p>
                                                        <a href="#" class="btn btn-outline-white btn-sm">
                                                            View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card  mb-4 ">
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <div class="d-lg-flex">
                                                    <div class="position-relative">
                                                        <img src="../assets/images/avatar/avatar-2.jpg" alt="" class="rounded-circle avatar-xl mb-3 mb-lg-0">
                                                        <a href="#" class="position-absolute mt-2 ms-n3" data-bs-toggle="tooltip" data-placement="top"
                                                           title="" data-original-title="Verifed">
                                                            <img src="../assets/images/svg/checked-mark.svg" alt="" height="30" width="30">
                                                        </a>
                                                    </div>
                                                    <div class="ms-lg-4">
                                                        <h4 class="mb-0">Paulina Rush</h4>
                                                        <p class="mb-0 fs-6">Front-end Developer, Designer</p>
                                                        <p class="fs-6 mb-1 text-warning"><span>4.5</span><span
                                                                class="mdi mdi-star text-warning me-2"></span>Instructor Rating</p>
                                                        <p class="fs-6 text-muted"><span class="me-2"><span
                                                                    class="text-dark fw-medium">8</span>
                              Courses</span><span class="ms-2"><span class="text-dark fw-medium">12,124 </span>
                              Students</span>
                                                        </p>
                                                        <p>Writing JS, CSS, and HTML professionally since 2004. Open source
                                                            contributor to projects like jQuery, jQueryUI, ESLint, Webpack,
                                                            npm, JSCS, Esprima and more.</p>
                                                        <a href="#" class="btn btn-outline-white btn-sm">
                                                            View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card  mb-4 ">
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <div class="d-lg-flex">
                                                    <div class="position-relative">
                                                        <img src="../assets/images/avatar/avatar-3.jpg" alt="" class="rounded-circle avatar-xl mb-3 mb-lg-0">
                                                        <a href="#" class="position-absolute mt-2 ms-n3" data-bs-toggle="tooltip" data-placement="top"
                                                           title="" data-original-title="Verifed">
                                                            <img src="../assets/images/svg/checked-mark.svg" alt="" height="30" width="30">
                                                        </a>
                                                    </div>
                                                    <div class="ms-lg-4">
                                                        <h4 class="mb-0">Avneet Brooks</h4>
                                                        <p class="mb-0 fs-6">Front-end Developer, Designer</p>
                                                        <p class="fs-6 mb-1 text-warning"><span>4.5</span>
                                                            <span class="mdi mdi-star text-warning me-2"></span>Instructor Rating</p>
                                                        <p class="fs-6 text-muted"><span class="me-2"><span
                                                                    class="text-dark fw-medium">23</span>
                              Courses</span><span class="ms-2"><span class="text-dark fw-medium">23,000 </span>
                              Students</span>
                                                        </p>
                                                        <p>Software developer and active open sorcerer. She speaks multiple
                                                            languages and is often overheard saying "Bonjour" in HTML.</p>
                                                        <a href="#" class="btn btn-outline-white btn-sm">
                                                            View Details
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card  ">
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <div class="d-lg-flex">
                                                    <div class="position-relative">
                                                        <img src="../assets/images/avatar/avatar-5.jpg" alt="" class="rounded-circle avatar-xl mb-3 mb-lg-0">
                                                        <a href="#" class="position-absolute mt-2 ms-n3" data-bs-toggle="tooltip" data-placement="top"
                                                           title="" data-original-title="Verifed">
                                                            <img src="../assets/images/svg/checked-mark.svg" alt="" height="30" width="30">
                                                        </a>
                                                    </div>
                                                    <div class="ms-lg-4">
                                                        <h4 class="mb-0">Bree Head</h4>
                                                        <p class="mb-0 fs-6">Front-end Developer, Designer</p>
                                                        <p class="fs-6 mb-1 text-warning"><span>4.5</span>
                                                            <span class="mdi mdi-star text-warning me-2"></span>Instructor Rating</p>
                                                        <p class="fs-6 text-muted"><span class="me-2"><span
                                                                    class="text-dark fw-medium">22</span>
                              Courses</span><span class="ms-2"><span class="text-dark fw-medium">40,224 </span>
                              Students</span>
                                                        </p>
                                                        <p>Bree Head developer, architect, occasional designer, and frequent
                                                            speaker. He’s passionate about building tools, systems, and
                                                            create high-performance teams and apps.
                                                        </p>
                                                        <a href="#" class="btn btn-outline-white btn-sm">
                                                            View Details
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
            </div>
        </div>
    @else
        <div class="py-8 py-lg-18">
            <div class="row mb-10 justify-content-center">
                <div class="col-lg-8 col-md-12 col-12 text-center">
                    <p class="lead">Sorry ,This <strong> {{$track->name}} </strong> It does not contain any courses</p>
                </div>
            </div>
        </div>
    @endif

@endsection



@section('footer')
    @include('layouts.webiste.footers.sub_footer')
@endsection

@section('js')
    <script>

        $(document).ready(function(){

            var _token = $('input[name="_token"]').val();

            load_data('','','',_token);

            function load_data(id="",level="",price="", _token)
            {
                $.ajax({
                    url:"{{ route('tracks.load_data',$track->name) }}",
                    dataType: "JSON",
                    method:"POST",
                    data:{id:id,level:level,price:price, _token:_token},
                    beforeSend:function () {

                        $('#loader').removeClass('hidden')
                    },
                    success:function(data)
                    {

                        $('#load_more_button').remove();
                        $('#post_data').append(data.html);

                        // if((data.courses).length < 4)
                        // {
                        //     $('.track_courses_count').html('');
                        // }  // Optional if count of courses less than 4 records
                    },
                    complete: function () {

                        $('#loader').addClass('hidden')
                    },
                })
            }

            $(document).on('click', '#load_more_button', function(){
                var id = $(this).data('id');
                var level = $("#levels").val();
                var price = $("#prices").val();
                $('#load_more_button').html('<div class="spinner-border spinner-border-sm me-2" role="status"> <span class="sr-only">Loading...</span></div>');
                load_data(id,level,price, _token);
            });




            function filter(level="",price="", _token)
            {
                $.ajax({
                    url:"{{ route('tracks.filter',$track->name) }}",
                    dataType: "JSON",
                    method:"POST",
                    data:{level:level,price:price, _token:_token},
                    beforeSend:function () {

                        $('#loader').removeClass('hidden')
                    },
                    success:function(data)
                    {
                        $('#load_more_button').remove();
                        $('#post_data').html('');
                        $('#post_data').append(data.html);

                        // if((data.courses).length < 4)
                        // {
                        //     $('.track_courses_count').html('');
                        // } // Optional if count of courses less than 4 records
                    },
                    complete: function () {

                        $('#loader').addClass('hidden')
                    },
                })
            }



            var arrayodids=["#levels","#prices"];
            arrayodids.forEach(function (e) {
                $(e).on('change',function () {
                    var level = $("#levels").val();
                    var price = $("#prices").val();
                    //var id = $("#load_more_button").data('id');
                    console.log(typeof (price));
                    filter(level,price, _token);
                });
            })

        });
    </script>
@endsection



