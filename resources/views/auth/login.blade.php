<!DOCTYPE html>
<html lang="en">

<head>

    @section('title')
        Sign in | LearnCode
    @endsection

    @include('layouts.webiste.headers.header')

</head>

<body>



    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0 min-vh-100">
            <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                <!-- Card -->
                <div class="card shadow ">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <a href="{{url('/')}}"><img src="{{URL::asset('website/assets/images/brand/logo/logo-icon.svg')}}" class="mb-4" alt=""></a>
                            <h1 class="mb-1 fw-bold">Sign in</h1>
                            <span>Don’t have an account? <a href="{{ route('register') }}" class="ms-1">Sign up</a></span>
                        </div>
                        <!-- Form -->
                        <form role="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Username -->
                            <div class="mb-3 {{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" placeholder="Email address here" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong >{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- Password -->
                            <div class="mb-3 {{ $errors->has('password') ? ' has-danger' : '' }}">
                                <label for="password" class="form-label ">Password</label>
                                <input type="password" id="password" class="form-control {{ $errors->has('password') ? ' has-danger' : '' }}" name="password" placeholder="**************" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- Checkbox -->
                            <div class="d-lg-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberme" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label " for="rememberme">Remember me</label>
                                </div>
                                <div>

                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">Forgot your password?</a>
                                    @endif

                                </div>
                            </div>
                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary ">Sign in</button>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="mt-4 text-center">
                                <!--Facebook-->
                                <a href="#" class="btn-social btn-social-outline btn-google">
                                    <i class="fab fa-google"></i>
                                </a>

                                <!--GitHub-->
                                <a href="#" class="btn-social btn-social-outline btn-github">
                                    <i class="fab fa-github"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('layouts.webiste.footers.scripts')

</body>

</html>
