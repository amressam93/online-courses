@extends('layouts.webiste.master')

@section('title') Online Courses - Learn Anything, On Your Schedule | LearnCode @endsection

@section('css')
    <style>
        #loading
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
                        <h1 class="mb-0 text-white display-4">Filter Page</h1>
                        @if(count($results)>0 && $search != null)
                        <h1 class="mb-0 text-white display-6" id="total">{{$total_courses}} results for “{{$search}}”</h1>
                        @else
                            <h1 class="mb-0 text-white display-6">Sorry, we couldn't find any results for “{{$search}}”</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    @if(count($results) > 0 && $search != null)
    <div class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">

                    <div class="row d-lg-flex justify-content-between align-items-center">
                        <div class="col-md-6 col-lg-8 col-xl-9 ">
                            <h4 class="mb-3 mb-lg-0" id="displaying_count">Displaying {{($results->currentpage()-1)*$results->perpage()+$results->count()}} out of {{$total_courses}} courses</h4>
                        </div>
                        <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3 ">
                            <div class="me-2">
                                <!-- Nav -->
                                <div class="nav btn-group flex-nowrap" role="tablist">
                                    <button class="btn btn-outline-white active" data-bs-toggle="tab" data-bs-target="#tabPaneGrid" role="tab"
                                            aria-controls="tabPaneGrid" aria-selected="true">
                                        <span class="fe fe-grid"></span>
                                    </button>
                                    <button class="btn btn-outline-white" data-bs-toggle="tab" data-bs-target="#tabPaneList" role="tab"
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
                            <!-- Checkbox -->
                            @foreach($tracks as $track)
                            <div class="form-check mb-1">
                                <input type="checkbox" value="{{$track->id}}" @if(request()->has('track') && in_array($track->id,request()->track )) checked @endif class="form-check-input common_selector course_track" id="reactCheck">
                                <label class="form-check-label" for="reactCheck">{{$track->name}} ({{ \App\course::SearchQuery($search)->where('track_id',$track->id)->count() }})</label>
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
                            <!-- Checkbox -->
                            <div class="form-check mb-1">
                                <input type="checkbox" class="form-check-input" id="allTwoCheck">
                                <label class="form-check-label" for="allTwoCheck">All Level</label>
                            </div>

                            @foreach($levels as $level)
                            <div class="form-check mb-1">
                                <input type="checkbox" value="{{$level->id}}" @if(request()->has('level') && in_array($level->id,request()->level )) checked @endif class="form-check-input common_selector course_level" id="AdvancedTwoCheck">
                                <label class="form-check-label" for="AdvancedTwoCheck">{{$level->name}} ({{ \App\course::SearchQuery($search)->where('level_id',$level->id)->count() }})</label>
                            </div>
                            @endforeach

                        </div>




                        <div class="card-body border-top">
                            <span class="dropdown-header px-0 mb-2"> Price</span>
                            <!-- Checkbox -->

                            @if($free_courses != 0)
                                <span id="free">
                            <div class="form-check mb-1" >
                                <input type="checkbox"  value="0" @if(request()->has('price') && in_array(0,request()->price )) checked @endif class="form-check-input common_selector course_price" id="free">
                                <label class="form-check-label"  for="free">Free (<span id="free_courses">{{$free_courses}}</span>)</label>
                            </div>
                                 </span>
                            @endif

                            @if($paid_courses != 0)
                                <span id="paid">
                            <div class="form-check mb-1">
                                <input type="checkbox" value="1" @if(request()->has('price') && in_array(1,request()->price )) checked @endif class="form-check-input common_selector course_price" id="paid">
                                <label class="form-check-label" for="paid">Paid (<span id="paid_courses">{{$paid_courses}}</span>)</label>
                            </div>
                                </span>
                            @endif

                        </div>

                    </div>
                </div>
                <!-- Tab content -->
                <div class="col-xl-9 col-lg-9 col-md-8 col-12">
                    <div class="tab-content filter_data" id="updateDiv">    <!-- filter_data -->
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
                                            <p class="mb-2 fs-6"><strong class="badge bg-secondary">Track: </strong> <a href="/tracks/{{$course->track->name}}" style="color:#a8a3b9"> {{$course->track->name}} </a></p>
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

                    </div>
                </div>
            </div>
        </div>
    </div>

    @else
        <div class="pb-4">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="mt-5">
                            <h2 class="fw-bold">Try adjusting your search. Here are some ideas:</h2>
                            <ul class="fs-4">
                                <li>Make sure all words are spelled correctly</li>
                                <li>Try different search terms</li>
                                <li>Try more general search terms</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection



@section('footer')
    @if(count($results)>0)
        @include('layouts.webiste.footers.sub_footer')
    @else
        @include('layouts.webiste.footers.footer')
    @endif
@endsection

@section('js')
    <script>


        {{--$('.course_price').click(function () {--}}

        {{--    var price = [];--}}

        {{--    $('.course_price').each(function () {--}}

        {{--        if($(this).is(":checked")){--}}

        {{--            price.push($(this).val());--}}
        {{--        }--}}

        {{--    });--}}

        {{--    console.log(price);    // object--}}
        {{--    //price = price.toString();--}}
        {{--    //console.log(typeof(price));--}}

        {{--    $.ajax({--}}

        {{--        type: "get",--}}
        {{--        dataType: "JSON",--}}
        {{--        url: "{{ route('course_search') }}",--}}
        {{--        data: {price:price,q:'{{$search}}'},--}}
        {{--        success: function (response) {--}}

        {{--            console.log(response)--}}

        {{--            $('#updateDiv').html();--}}
        {{--            $('#updateDiv').html(response.html);--}}


        {{--           $('#total').text('');--}}
        {{--           $('#total').text(response.total_courses + ' results for ' + '“'+ response.search +'”');--}}

        {{--            $('#displaying_count').text('');--}}
        {{--            $('#displaying_count').text('Displaying '+response.displaying + ' out of ' + response.total_courses);--}}

        {{--            //console.log(response.displaying);--}}

        {{--        }--}}

        {{--    });--}}

        {{--});--}}




        {{--$(document).ready(function(){--}}

        {{--    $(document).on('click', '.pagination a', function(event){--}}
        {{--        event.preventDefault();--}}

        {{--        var url = $(this).attr('href');--}}

        {{--        console.log(url);--}}

        {{--        //var page_number = url.split("&page=")[1]--}}

        {{--        //console.log(page_number);--}}

        {{--        $.ajax({--}}

        {{--            type: "get",--}}
        {{--            dataType: "JSON",--}}
        {{--            url: url,--}}
        {{--            success: function (response) {--}}

        {{--                console.log(response)--}}
        {{--                $('#updateDiv').html();--}}
        {{--                $('#updateDiv').html(response.html);--}}


        {{--                $('#total').text('');--}}
        {{--                $('#total').text(response.total_courses + ' results for ' + '“'+ response.search +'”');--}}


        {{--                $('#displaying_count').text('');--}}
        {{--                $('#displaying_count').text('Displaying '+response.displaying + ' out of ' + response.total_courses);--}}

        {{--            }--}}

        {{--        });--}}
        {{--    });--}}


        {{--});--}}

            //////////////////////////////////////    end method one //////////////

        $(document).ready(function(){


            //filter_data();

            function filter_data()
            {
               // $('.filter_data').html('<div id="loading" style="" ></div>');
               // var action = 'fetch_data';
               // var minimum_price = $('#hidden_minimum_price').val();
               // var maximum_price = $('#hidden_maximum_price').val();



                var price = get_filter('course_price');
                var track = get_filter('course_track');
                var level = get_filter('course_level');

                console.log(level);
                //console.log(track);

                $.ajax({

                    type: "get",
                    dataType: "JSON",
                    url: "{{ route('course_search') }}",
                    data: {price:price,track:track,level:level,q:'{{$search}}'},
                    beforeSend:function () {

                        $('.filter_data').html('<div id="loading" style="" ></div>');
                    },
                    success: function (response) {

                        console.log(response)

                        $('#updateDiv').html();
                        $('#updateDiv').html(response.html);


                        if(response.total_courses != 0)
                        {
                            $('#total').text('');
                            $('#total').text(response.total_courses + ' results for ' + '“'+ response.search +'”');

                            $('#displaying_count').text('');
                            $('#displaying_count').text('Displaying '+response.displaying + ' out of ' + response.total_courses);
                        }
                        else
                        {
                            $('#total').text('');
                            $('#total').text(' Sorry, we could not find any results. ');

                            $('#displaying_count').text('');
                            $('#displaying_count').text('No Results Found ');
                        }


                        if(response.paid_courses > 0) //false
                        {

                            $('#paid_courses').text('');
                            $('#paid_courses').text(response.paid_courses);

                            $('#free_courses').text('');
                            $('#free_courses').text(response.free_courses);
                        }
                        else
                        {
                         //   $('#paid').html('');

                        }



                        if(response.free_courses > 0)
                        {
                            $('#free_courses').text('');
                            $('#free_courses').text(response.free_courses);

                            $('#paid_courses').text('');
                            $('#paid_courses').text(response.paid_courses);

                        }
                        else
                        {
                          //  $('#free').text('');

                        }

                       // $('#total').text('');
                       // $('#total').text(response.total_courses + ' results for ' + '“'+ response.search +'”');

                       // $('#displaying_count').text('');
                       // $('#displaying_count').text('Displaying '+response.displaying + ' out of ' + response.total_courses);

                        //console.log(response.displaying);

                    }

                });


               // var ram = get_filter('ram');
               // var storage = get_filter('storage');
                // $.ajax({
                //     url:"fetch_data.php",
                //     method:"POST",
                //     data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
                //     success:function(data){
                //         $('.filter_data').html(data);
                //     }
                // });
            }

            function get_filter(class_name)
            {
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function(){
                filter_data();
            });





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

                        $('.filter_data').html('<div id="loading" style="" ></div>');
                    },
                    success: function (response) {

                        console.log(response)
                        $('#updateDiv').html();
                        $('#updateDiv').html(response.html);


                        $('#total').text('');
                        $('#total').text(response.total_courses + ' results for ' + '“'+ response.search +'”');


                        $('#displaying_count').text('');
                        $('#displaying_count').text('Displaying '+response.displaying + ' out of ' + response.total_courses);

                    }

                });
            });


        });



    </script>
@endsection


