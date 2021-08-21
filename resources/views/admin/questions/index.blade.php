@extends('layouts.app', ['title' => __('Question Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Questions') }} ({{$countOfQuestions}})</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary">{{ __('Add Question') }}</a>
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
                                <th scope="col">{{ __('Question') }}</th>
                                <th scope="col">{{ __('Answer') }}</th>
                                <th scope="col">{{ __('Score') }}</th>
                                <th scope="col">{{ __('Quiz Name') }}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col" class="text-right">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($questions))
                                @foreach ($questions as $question)
                                    <tr>
                                        <td title="{{$question->title}}"><a href="{{route('questions.show',$question->id)}}">{{$question->title}}</a></td>

                                        <td>{{$question->right_answer}}</td>

                                        <td>{{$question->score}}</td>

                                        <td><a href="{{route('quizzes.show',$question->quiz->id)}}">{{$question->quiz->name}}</a></td>

                                        <td>{{ $question->created_at->diffForHumans() }}</td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                    <form action="{{ route('questions.destroy', $question) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a class="dropdown-item" href="{{ route('questions.edit', $question) }}">{{ __('Edit') }}</a>
                                                        <a class="dropdown-item" href="{{ route('questions.show', $question) }}">{{ __('Show') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this Question?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <p class="lead text-center">No Quizzes Found.</p>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $questions->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection




