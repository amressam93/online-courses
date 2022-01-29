
@extends('layouts.app', ['title' => __('Course Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Update Course')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Course Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('courses.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('courses.update',$course) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h6 class="heading-small text-muted mb-4">{{ __('Course information') }}</h6>
                            <div class="pl-lg-4">

                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Course Title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Course Title') }}" value="{{ old('title',$course->title) }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>



                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{ __('Course Description') }}</label>
                                    <textarea  name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Description Course') }}" rows="3" required autofocus>{{ old('description',$course->description) }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-link">{{ __('Course Link') }}</label>
                                    <input type="text" name="link" id="input-link" class="form-control form-control-alternative{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('Course Link') }}" value="{{old('link',$course->link)}}" required>

                                    @if ($errors->has('link'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('link') }}</strong>
                                        </span>
                                    @endif
                                </div>




                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-status">{{ __('Course Status') }}</label>
                                    <select name="status" required class="form-control" id="input-status">
                                        <option value="0" {{($course->status == 0) ? 'selected' : ''}} >Free</option>
                                        <option value="1" {{($course->status == 1) ? 'selected' : ''}} >Paid</option>
                                    </select>

                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                    @endif
                                </div>



                                <div class="form-group{{ $errors->has('track_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-track_id">{{ __('Course Track') }}</label>


                                    <select name="track_id" required class="form-control" id="input-track_id">
                                        @foreach(App\track::all() as $track)
                                            <option value="{{$track->id}}" {{($track->id == $course->track_id) ? 'selected' : ''}} >{{$track->name}}</option>
                                        @endforeach
                                    </select>


                                    @if ($errors->has('track_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('track_id') }}</strong>
                                        </span>
                                    @endif
                                </div>




                                <div class="form-group{{ $errors->has('level_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-track_id">{{ __('Course Level') }}</label>


                                    <select name="track_id" required class="form-control" id="input-track_id">
                                        @foreach(\App\CourseLevel::all() as $level)
                                            <option value="{{$level->id}}" {{($level->id == $course->level_id) ? 'selected' : ''}} >{{$level->name}}</option>
                                        @endforeach
                                    </select>


                                    @if ($errors->has('level_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('level_id') }}</strong>
                                        </span>
                                    @endif
                                </div>





                                <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                    <div class="custom-file">
                                        <label class="form-control-label" for="input-image">{{ __('Old Course Image') }}</label><br>
                                        @if($course->photo)
                                            <img src="/images/{{$course->photo->filename}}" alt="" class="img-thumbnail" style="width: 208px;height: 124px">
                                        @else
                                            <img src="/images/cases/no_image_found.jpg" alt="" class="img-thumbnail" style="width: 208px;height: 124px">
                                        @endif
                                        <br><br>
                                        <label class="form-control-label" for="input-image">{{ __('Update Course Image') }}</label>
                                        <input type="file" name="image" id="input-image" class="form-control form-control-alternative{{ $errors->has('image') ? ' is-invalid' : '' }}">
                                    </div>


                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>




                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update Course') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection



