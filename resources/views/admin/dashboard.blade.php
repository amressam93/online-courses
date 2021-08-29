@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">

                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Recent Courses</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('courses.index')}}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Course Name') }}</th>
                                <th scope="col">{{__('Track Name')}}</th>
                                <th scope="col">{{__('No. of Students')}}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col">{{ __('Last updated') }}</th>
                                <th scope="col" class="text-right">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($courses))
                                @foreach ($courses as $course)
                                    <tr>
                                        <td><a href="{{route('courses.show',$course->id)}}">{{ $course->title }}</a></td>

                                        <td><a class="badge badge-pill badge-primary lower" href="{{route('tracks.show',$course->track->id)}}">{{$course->track->name}}</a></td>
                                        <td style="text-align: center">
                                            @if(count($course->users) == 0)
                                                <span class="badge badge-pill badge-warning lower">No Students Enroll In This Course</span>
                                            @else
                                                <span class="badge badge-pill badge-success lower">{{count($course->users)}}</span>
                                            @endif
                                        </td>
                                        <td>{{ $course->created_at->diffForHumans() }}</td>
                                        <td>{{ $course->updated_at->diffForHumans() }}</td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                    <form action="{{ route('courses.destroy', $course) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a class="dropdown-item" href="{{ route('courses.show', $course) }}">{{ __('Show Courses') }}</a>
                                                        <a class="dropdown-item" href="{{ route('courses.edit', $course) }}">{{ __('Edit') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this Course?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td class="lead text-center">No Courses Found.</td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-xl-4">

                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Recent Tracks</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('tracks.index')}}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{__('No. of Courses')}}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col">{{ __('Last updated') }}</th>
                                <th scope="col" class="text-right">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($tracks))
                                @foreach ($tracks as $track)
                                    <tr>
                                        <td><a href="{{route('tracks.show',$track->id)}}">{{ $track->name }}</a></td>

                                        <td>
                                            @if(count($track->courses) == 0)
                                                <span class="badge badge-pill badge-warning">no courses in this track</span>
                                            @else
                                                <span class="badge badge-pill badge-success">{{count($track->courses)}}</span>
                                            @endif
                                        </td>

                                        <td>{{ $track->created_at->diffForHumans() }}</td>
                                        <td>{{ $track->updated_at->diffForHumans() }}</td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                    <form action="{{ route('tracks.destroy', $track) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a class="dropdown-item" href="{{ route('tracks.show', $track) }}">{{ __('Show Courses') }}</a>
                                                        <a class="dropdown-item" href="{{ route('tracks.edit', $track) }}">{{ __('Edit') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this Track?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <td class="lead text-center">No Tracks Found.</td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="row mt-5">

            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Recent Quizzes</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Quiz Name') }}</th>
                                    <th scope="col">{{ __('NO. Of Questions') }}</th>
                                    <th scope="col">{{ __('Course Name') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">{{ __('Last updated') }}</th>
                                    <th scope="col" class="text-right">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($quizzes))
                                @foreach($quizzes as $quiz)
                                    <tr>
                                        <td><a href="{{route('quizzes.show',$quiz->id)}}">{{$quiz->name}}</a></td>

                                        <td>
                                            @if(count($quiz->questions) == 0)
                                                <span class="badge badge-pill badge-warning lower">No Questions</span>
                                            @else
                                                <span class="badge badge-pill badge-success lower">{{$quiz->questions->count()}}</span>
                                            @endif
                                        </td>

                                        <td><a href="{{route('courses.show',$quiz->course->id)}}">{{$quiz->course->title}}</a></td>

                                        <td>{{ $quiz->created_at->diffForHumans() }}</td>

                                        <td>{{ $quiz->updated_at->diffForHumans() }}</td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                    <form action="{{ route('quizzes.destroy', $quiz) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a class="dropdown-item" href="{{ route('quizzes.edit', $quiz) }}">{{ __('Edit') }}</a>
                                                        <a class="dropdown-item" href="{{ route('quizzes.show', $quiz) }}">{{ __('Show') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this Quiz?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <td> No Quizzes Found. </td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Recent Users</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('users.index')}}" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td>{{ $user->created_at->format('Y/m/d H:i') }}</td>
                                        <td>{{$user->admin == 0 ? "User" : ($user->admin == 1 ? "Admin" : "")}}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('users.destroy', $user) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('users.edit', $user) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <td>No Users Found.</td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
