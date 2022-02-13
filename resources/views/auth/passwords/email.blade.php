<!DOCTYPE html>
<html lang="en">

<head>

    @section('title')
        Reset Password | LearnCode
    @endsection

    @include('layouts.webiste.headers.header')

</head>

<body>



<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
        <div class="col-lg-5 col-md-8 py-8 py-xl-0">
            <!-- Card -->
            <div class="card shadow">
                <!-- Card body -->
                <div class="card-body p-6">
                    <div class="mb-4">
                        <a href="{{url('/')}}"><img src="{{URL::asset('website/assets/images/brand/logo/logo-icon.svg')}}" class="mb-4" alt="logo" /></a>
                        <h1 class="mb-1 fw-bold">Forgot Password</h1>
                        <p>Fill the form to reset your password.</p>
                    </div>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Form -->
                    <form role="form" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3 {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter Your Email " required autofocus />
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                 </span>
                            @endif
                        </div>
                        <!-- Button -->
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">
                                Send Password Reset Link
                            </button>
                        </div>
                        <span>Return to <a href="{{route('login')}}">sign in</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.webiste.footers.scripts')

</body>

</html>

