@extends('layouts.app', ['title' => __('Video Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('preview Video')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Video Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('videos.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <iframe width="700" height="315" src="https://www.youtube.com/embed/{{$video->link}}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

