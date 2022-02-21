@extends('layouts.webiste.master')

@section('title') All Courses - Browse All Courses | LearnCode @endsection

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

    <!-- Page header -->
    <div class="bg-primary py-4 py-lg-6">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div>
                        <h1 class="text-white mb-1 display-4">Browse All Courses</h1>
                        <p class="mb-0 text-white lead">Get inspired and discover something new today. Grow your skill with the most reliable online courses and certifications {{$tracks != ''  ? 'in '.$tracks : ''}}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                    <div class="row d-lg-flex justify-content-between align-items-center">
                        <div class="col-md-6 col-lg-8 col-xl-9 ">
                            <h4 class="mb-3 mb-lg-0" id="displaying_courses_count"></h4>
                        </div>
                        <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3 ">
                            <div class="me-2">
                                <!-- Nav -->
                                <div class="nav btn-group flex-nowrap" role="tablist">
                                    <button class="btn btn-outline-white active courses_grid" data-bs-toggle="tab" data-bs-target="#tabPaneGrid" role="tab"
                                            aria-controls="tabPaneGrid" aria-selected="true">
                                        <span class="fe fe-grid"></span>
                                    </button>
                                    <button class="btn btn-outline-white courses_list" data-bs-toggle="tab" data-bs-target="#tabPaneList" role="tab"
                                            aria-controls="tabPaneList" aria-selected="false">
                                        <span class="fe fe-list"></span>
                                    </button>
                                </div>
                            </div>
                            <!-- List  -->
                            <select class="selectpicker" data-width="100%">
                                <option value="">Sort by</option>
                                <option value="Newest">Newest</option>
                                <option value="Free">Free</option>
                                <option value="Most Popular">Most Popular</option>
                                <option value="Highest Rated">Highest Rated</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-4 mb-lg-0">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h4 class="mb-0">Filter</h4>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <span class="dropdown-header px-0 mb-2"> Category</span>

                            @foreach(\App\track::all() as $track)
                                <div class="form-check mb-1">
                                    <input type="checkbox" value="{{$track->id}}" class="form-check-input common_selector course_track" id="reactCheck">
                                    <label class="form-check-label" for="reactCheck">{{$track->name}} ({{$track->courses->count()}})</label>
                                </div>
                            @endforeach

                        </div>
                        <!-- Card body -->
                        <div class="card-body border-top">
                            <span class="dropdown-header px-0 mb-2"> Ratings</span>
                            <!-- Custom control -->
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" class="form-check-input" id="starRadio1" name="customRadio">
                                <label class="form-check-label" for="starRadio1">
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star text-warning "></i>
                                    <span class="fs-6">4.5 & UP</span>
                                </label>
                            </div>
                            <!-- Custom control -->
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" class="form-check-input" id="starRadio2" name="customRadio" checked>
                                <label class="form-check-label" for="starRadio2"> <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star text-warning "></i>
                                    <span class="fs-6">4.0 & UP</span></label>
                            </div>
                            <!-- Custom control -->
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" class="form-check-input" id="starRadio3" name="customRadio">
                                <label class="form-check-label" for="starRadio3"> <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star text-warning "></i>
                                    <span class="fs-6">3.5 & UP</span></label>
                            </div>
                            <!-- Custom control -->
                            <div class="custom-control custom-radio mb-1">
                                <input type="radio" class="form-check-input" id="starRadio4" name="customRadio">
                                <label class="form-check-label" for="starRadio4"> <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                    <i class="mdi mdi-star text-warning "></i>
                                    <span class="fs-6">3.0 & UP</span></label>
                            </div>
                        </div>
                        <!-- Card body -->


                        <div class="card-body border-top">
                            <span class="dropdown-header px-0 mb-2"> Skill Level</span>

                            @foreach(\App\CourseLevel::all() as $level)
                                <div class="form-check mb-1">
                                    <input type="checkbox" value="{{$level->id}}" class="form-check-input common_selector course_level" id="beginnerTwoCheck">
                                    <label class="form-check-label" for="beginnerTwoCheck">{{$level->name}} ({{$level->courses->count()}})</label>
                                </div>
                            @endforeach

                        </div>


                        <div class="card-body border-top">
                            <span class="dropdown-header px-0 mb-2"> Skill Level</span>


                            <div class="form-check mb-1">
                                <input type="checkbox" value="0" class="form-check-input common_selector course_price" id="beginnerTwoCheck">
                                <label class="form-check-label" for="beginnerTwoCheck">Free ({{\App\course::where('status',0)->count()}})</label>
                            </div>

                            <div class="form-check mb-1">
                                <input type="checkbox" value="1" class="form-check-input common_selector course_price" id="beginnerTwoCheck">
                                <label class="form-check-label" for="beginnerTwoCheck">Paid ({{\App\course::where('status',1)->count()}})</label>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- Tab content -->
                <div class="col-xl-9 col-lg-9 col-md-8 col-12">
                    {{ csrf_field() }}
                    <div class="tab-content" id="load_data">

                    </div>
                    <div id="loader" class="lds-dual-ring hidden overlay"></div>

                    <div id="load_data_message"></div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('footer')
    @include('layouts.webiste.footers.sub_footer')
@endsection

@section('js')
    <script>

        $(document).ready(function() {     // set footer in bottom.

            var docHeight = $(window).height();
            var footerHeight = $('.footer').height();
            var footerTop = $('.footer').position().top + footerHeight;

            if (footerTop < docHeight) {
                $('.footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
            }
        });

    </script>

    <script>

        function courses_grid() {

            $('.courses_list').on('click',function(){

                $('.courses_grid').removeClass("active");
                $('.courses_list').addClass("active");

                $("#tabPaneGrid").removeClass("show active");
                $("#tabPaneList").addClass("show active");

            });

        }

    </script>

    <script>
        $(document).ready(function(){

            var _token = $('input[name="_token"]').val();

            load_date();

            function load_date()
            {
                var track = get_filter('course_track');
                var level = get_filter('course_level');
                var price = get_filter('course_price');

                $.ajax({

                    type: "get",
                    dataType: "JSON",
                    url: "{{ route('load_more_all_courses') }}",
                    data: {price:price,track:track,level:level},
                    beforeSend:function () {
                        $('#loader').removeClass('hidden')
                    },
                    success: function (data) {


                        console.log(data);
                        $('#load_data').append(data.html);

                        if(data.total_courses != 0)
                        {
                            $('#displaying_courses_count').text('');
                            $('#displaying_courses_count').text('Displaying '+ data.displaying + ' out of ' + data.total_courses);
                        }
                        else
                        {

                            $('#displaying_courses_count').text('');
                            $('#displaying_courses_count').text('No Results Found ');
                        }


                    },complete: function () {

                        $('#loader').addClass('hidden')
                    }

                });

            }

            function filter_date()
            {
                var track = get_filter('course_track');
                var level = get_filter('course_level');
                var price = get_filter('course_price');

                $.ajax({

                    type: "get",
                    dataType: "JSON",
                    url: "{{ route('all-courses-filter') }}",
                    data: {price:price,track:track,level:level},
                    beforeSend:function () {
                        $('#loader').removeClass('hidden')
                    },
                    success: function (data) {


                        console.log(data);
                        $('#load_data').html('');
                        $('#load_data').append(data.html);

                        if(data.total_courses != 0)
                        {
                            $('#displaying_courses_count').text('');
                            $('#displaying_courses_count').text('Displaying '+ data.displaying + ' out of ' + data.total_courses);
                        }
                        else
                        {

                            $('#displaying_courses_count').text('');
                            $('#displaying_courses_count').text('No Results Found ');
                        }


                    },complete: function () {

                        $('#loader').addClass('hidden')
                    }

                });

            }


            $(document).on('click', '.pagination a', function(event){

                event.preventDefault();

                var url = $(this).attr('href');

                console.log(url);

                //var page_number = url.split("&page=")[1]

                //console.log(page_number);

                $.ajax({

                    type: "get",
                    dataType: "JSON",
                    url: url,
                    beforeSend:function () {

                        $('#loader').removeClass('hidden')
                    },
                    success: function (data) {

                        console.log(data);
                      //  $('#updateDiv').html();
                      //  $('#updateDiv').html(response.html);

                        $('#load_data').html('');
                        $('#load_data').append(data.html);


                        if(data.total_courses != 0)
                        {
                            $('#displaying_courses_count').text('');
                            $('#displaying_courses_count').text('Displaying '+ data.displaying + ' out of ' + data.total_courses);
                        }
                        else
                        {

                            $('#displaying_courses_count').text('');
                            $('#displaying_courses_count').text('No Results Found ');
                        }


                    },
                    complete: function () {

                        $('#loader').addClass('hidden')
                    }

                });
            });




            function get_filter(class_name)
            {
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }


            $('.common_selector').click(function(){

                filter_date();

            });



        });


    </script>

@endsection





