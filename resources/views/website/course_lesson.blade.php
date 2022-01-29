@extends('layouts.webiste.master')

@section('title') {{$course->title}} | LearnCode @endsection

@section('css')

@endsection

@section('content')

    <!-- videos iframe -->

    <div class="mt-13 course-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Tab content -->

                    <div class="tab-content content" id="course-tabContent">

                        @foreach($course->videos as $video)

                            <div class="tab-pane fade {{$loop->first ? 'show active' : ''}}" id="course-{{$video->id}}" role="tabpanel" aria-labelledby="course-{{$video->id}}-tab">
                                <div class="d-lg-flex align-items-center justify-content-between mb-4">
                                    <div>
                                        <h2 class="h3 mb-0">{{$video->title}}</h2>
                                    </div>
                                </div>
                                <!-- Video -->
                                <div class="embed-responsive  position-relative w-100 d-block overflow-hidden p-0" style="height: 600px;">
                                    <iframe class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100" src="https://www.youtube.com/embed/{{$video->link}}"></iframe>
                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- sidebar -->
    <div class="card course-sidebar" id="courseAccordion">
        <!-- List group -->
        <ul class="list-group list-group-flush course-list" id="test_overflow">
            <li class="list-group-item">
                <h4 class="mb-0">Table of Content</h4>
            </li>



        @if(count($course->videos) > 0)
            <!-- List group item -->

                @foreach($course->videos as $video)
                    <li class="list-group-item">
                        <!-- Toggle -->
                        <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0 " data-bs-toggle="collapse"
                           href="#video_{{$video->id}}" role="button" aria-expanded="false" aria-controls="video_{{$video->id}}">
                            <div class="me-auto">
                                {{$video->title}}
                            </div>
                            <!-- Chevron -->
                            <span class="chevron-arrow  ms-4"><i class="fe fe-chevron-down fs-4"></i></span>
                        </a>
                        <!-- Row -->
                        <!-- Collapse -->
                        <div class="collapse {{$loop->first ? 'show' : ''}}" id="video_{{$video->id}}" data-bs-parent="#courseAccordion">
                            <div class="py-4 nav" id="course-tabOne" role="tablist" aria-orientation="vertical" style="display: inherit;">
                                <a class="test_amr_essam mb-2 d-flex justify-content-between align-items-center text-decoration-none"
                                   id="course-{{$video->id}}-tab" data-bs-toggle="pill" href="#course-{{$video->id}}" role="tab" aria-controls="course-{{$video->id}}"
                                   aria-selected="false">
                                    <div class="text-truncate">
                                     <span class="icon-shape bg-light text-primary icon-sm  rounded-circle me-2"><i class="fe fe-play  fs-6"></i></span>
                                        <span>{{$video->title}}</span>
                                    </div>
                                    <div class="text-truncate">
                                        <span>1m 7s</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach


                <li class="list-group-item" style="margin-bottom:150px">
                    <!-- Toggle -->
                    <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse"
                       href="#courseEleven" role="button" aria-expanded="false" aria-controls="courseEleven">
                        <div class="me-auto">
                            <!-- Title -->
                            <h2 style="color:#754ffe">Course Quizzes</h2>
                        </div>
                        <!-- Chevron -->
                        <span class="chevron-arrow  ms-4">
                          <i class="fe fe-chevron-down fs-4"></i>
                        </span>
                    </a>
                    <!-- / .row -->
                    <!-- Collapse -->
                    @if(count($course->quizzes) > 0)
                    <div class="collapse" id="courseEleven" data-bs-parent="#courseAccordion">
                        <div class="py-4">
                            @foreach($course->quizzes as $quiz)
                            <h4 style="color:#754ffe">
                                @if(in_array($quiz->id, $quizzes_ids))
                                    <a class="disableClick">{{$quiz->name}} <span class="badge bg-success">Completed</span></a>
                                @else
                                     <a href="{{route('course_quizzes',['slug' => $course->slug ,'quizName' => $quiz->name])}}" target="_blank">{{$quiz->name}}</a>
                                @endif
                            </h4>
                            @endforeach
                        </div>
                    </div>
                    @else

                        <div class="collapse"  id="courseEleven" data-bs-parent="#courseAccordion">
                            <div class="py-4">
                                <div class="alert alert-danger">This Course Does Not Include Any Quizzes.</div>
                            </div>
                        </div>

                    @endif
                </li>


            @else
                <div class="alert alert-danger">This Course Does Not Include Any Videos.</div>
            @endif




        </ul>
    </div>



@endsection




@section('js')
   <script>
       $(document).ready(function(){
           $("nav").each(function(){
              $(this).addClass("fixed-top");
           })
       })
   </script>


   <script>
       $(document).ready(function(){
           $('.test_amr_essam').click(function(){
               // if already any element in active status remove it
               $('.test_amr_essam').removeClass('active');
               // add active status to this one only
               $(this).addClass('active');

           })
       })
   </script>

@endsection

