@extends('layouts.webiste.master')

@section('title') {{$course->title}} | Quiz | {{$quiz->name}} | LearnCode @endsection

@section('css')

@endsection

@section('content')

    <!-- Page header-->
    <div class="py-4 py-lg-6 bg-primary">
        <div class="container">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <!-- Content -->
                        <div class="mb-4 mb-lg-0">
                            <h1 class="text-white mb-1">Quiz Name : {{$quiz->name}}</h1>
                            <p class="mb-0 text-white lead">
                                Just fill the form and Answer For Quiz To Get Score.
                            </p>
                        </div>
                        <div>
                            <a href="{{route('course_lessons',['slug' => $course->slug , 'courseId' => $course->id])}}" class="btn btn-white ">Back to Course</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Page Content -->
    <div class="pb-12">
        <div class="container">
            <div id="courseForm" class="bs-stepper">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10 col-md-12 col-12">

                    <div class="bs-stepper-content mt-5">

                        @include('flash-message')

                        <form method="POST" action="{{route('course_quizzes',['slug' => $quiz->course->slug,'quizName' => $quiz->name])}}">
                            @csrf
                            <!-- Content one -->
                                <!-- Card -->
                                <div class="card mb-3">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">{{$quiz->name}} <span style="color:#754ffe">Quiz</span></h4>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body test_card">

                                        @foreach($quiz->questions as $question)
                                        <div class="mb-3">
                                            <label for="question_title" class="form-label">Q: {{$question->title}} <small style="color:#754ffe"> ( {{$question->score}} Points )</small>  </label>


                                            @if($question->type == 'text')
                                            <input id="question_title" class="form-control" type="text" name="answer{{$question->id}}" placeholder="Question Answer" />
                                            @else
                                                <?php $answers = explode(',',$question->answers) ?>
                                                @foreach($answers as $answer)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="answer{{$question->id}}" value="{{$answer}}"  id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                                {{$answer}}
                                                            </label>
                                                        </div>
                                            @endforeach
                                            @endif
                                        </div>
                                            @if(!$loop->last)
                                                <hr>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                                <!-- Button -->
                                <button class="btn btn-success" type="submit">
                                    Save
                                </button>

                        </form>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection


@section('footer')
    @include('layouts.webiste.footers.sub_footer')
@endsection

@section('js')

@endsection

