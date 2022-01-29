@extends('layouts.app', ['title' => __('Course Levels Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Levels') }} ({{$countOfLevels}})</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('levels.create') }}" class="btn btn-sm btn-primary">{{ __('Add Level') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
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
                            @if(count($levels))
                                @foreach ($levels as $level)
                                    <tr>
                                        <td><a href="#">{{ $level->name }}</a></td>

                                        <td>
                                            @if(count($level->courses) == 0)
                                                <span class="badge badge-pill badge-warning">no courses in this Level</span>
                                            @else
                                                <span class="badge badge-pill badge-success">{{count($level->courses)}}</span>
                                            @endif
                                        </td>

                                        <td>{{ $level->created_at->diffForHumans() }}</td>
                                        <td>{{ $level->updated_at->diffForHumans() }}</td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                    <form action="{{ route('levels.destroy', $level) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a class="dropdown-item" href="{{ route('levels.show', $level) }}">{{ __('Show Level') }}</a>
                                                        <a class="dropdown-item" href="{{ route('levels.edit', $level) }}">{{ __('Edit') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this Level ?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <p class="lead text-center">No Levels Found.</p>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $levels->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

