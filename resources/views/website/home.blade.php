@extends('layouts.webiste.master')

@section('title')
    Geeks - Online Courses
@endsection

@section('css')

@endsection

    @section('content')

       @include('layouts.webiste.sliders.slider')

       @include('layouts.webiste.sliders.utilities')


       <!--Start my learning Section -->
       @auth()
          @include('layouts.webiste.sections.my_learning')
       @endauth
       <!--End my learning Section -->

       @php $i = 0; @endphp

       @foreach($tracks as $track)

        @if($track->courses->count() > 0)

           @include('layouts.webiste.sections.last_courses')

        @endif


           @if ($i == 1)

               @include('layouts.webiste.sections.famous_tracks')

           @endif


        @if ($i == 1)

            @auth()
              @if($recommended_courses->count() > 0)

                 @include('layouts.webiste.sections.recommended_courses')

              @endif
            @endauth

        @endif


           @php $i++; @endphp

       @endforeach

    @endsection

@section('js')

    <script>

        var tracks = JSON.parse('{{json_encode($tracksname)}}'.replace(/&quot;/g,'"'));

        for (var key in tracks) {

            var value = tracks[key];
            var id    = key;

            if ($("."+value+"_"+id).length) tns({
                container: "."+value+"_"+id,
                loop: !1,
                startIndex: 1,
                items: 1,
                nav: !1,
                autoplay: !0,
                swipeAngle: !1,
                speed: 400,
                autoplayButtonOutput: !1,
                mouseDrag: !0,
                lazyload: !0,
                gutter: 20,
                controlsContainer: "."+value+id,
                responsive: {
                    768: {
                        items: 2
                    },
                    990: {
                        items: 4
                    }
                }
            });


        }

    </script>

@endsection
