@if ($message = Session::get('success-enroll'))
    <div class="alert alert-success text-dark-success alert-dismissible fade show" role="alert">
        <p class="mb-0">
            {{ $message }}
        </p>
        <!-- Button -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

        </button>
    </div>
@endif


@if ($message = Session::get('fail-enroll'))
    <div class="alert alert-danger text-dark-danger alert-dismissible fade show" role="alert">
        <p class="mb-0">
            {{ $message }}
        </p>
        <!-- Button -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

        </button>
    </div>
@endif


