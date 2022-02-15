@extends('layouts.webiste.master')

@section('title') All Tracks - Browse Track | LearnCode @endsection

@section('css')

@endsection

@section('content')

    <!-- Page header -->
    <div class="bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="py-4 py-lg-6">
                        <h1 class="mb-0 text-white display-4">Browse Tracks</h1>
                        <p class="text-white mb-0 lead">
                            Get started by learning from a Track below
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-8 col-md-6 col-12">
                            @if($tracks->count()>0)
                            <h4 class="mb-3 mb-md-0">Total {{$tracks->count()}} Tracks</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="container">
        <div class="row">

           @forelse($tracks as $track)
            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                <!-- Card -->
                <div class="card mb-4 card-hover">
                    <div class="d-flex justify-content-between align-items-center p-4">
                        <div class="d-flex">
                            <a href="{{route('track_courses',$track->name)}}">
                                <!-- Img -->
                                <img src="{{URL::asset('website/assets/images/path/path-angular.jpg')}}" alt="" class="avatar-md" /></a>
                            <div class="ms-3">
                                <h4 class="mb-1">
                                    <a href="{{route('track_courses',$track->name)}}" class="text-inherit">
                                        {{$track->name}}
                                    </a>
                                </h4>
                                <p class="mb-0 fs-6">
                                      <span class="me-2"><span class="text-dark fw-medium">{{$track->courses->count()}}</span>
                                        Courses</span>
                                                        <span><span class="text-dark fw-medium">50 </span>
                                        Hours</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center mt-5">
                    <p>Oops ! No Tracks Found. </p>
                </div>
            @endforelse

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
@endsection




