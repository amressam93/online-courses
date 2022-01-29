@if ($message = Session::get('success'))
    <div class="alert alert-success text-dark-success alert-dismissible fade show" role="alert">
        <p class="mb-0">
            {{ $message }}
        </p>
        <!-- Button -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

        </button>
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger text-dark-danger alert-dismissible fade show" role="alert">
        <p class="mb-0">
            {{ $message }}
        </p>
        <!-- Button -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

        </button>
    </div>
@endif





@if ($message = Session::get('warning'))
    <div class="alert alert-warning text-dark-warning alert-dismissible fade show" role="alert">
        <p class="mb-0">
            {{ $message }}
        </p>
        <!-- Button -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

        </button>
    </div>
@endif



@if ($message = Session::get('info'))
    <div class="alert alert-info text-dark-info alert-dismissible fade show" role="alert">
        <p class="mb-0">
            {{ $message }}
        </p>
        <!-- Button -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

        </button>
    </div>
@endif

@if ($errors->any())
    <ul class="alert alert-danger list-unstyled">
        @foreach ($errors->all() as $error)
            <li class="mb-1">{{ $error }}</li>
        @endforeach
    </ul>
@endif

