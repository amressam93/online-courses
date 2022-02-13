<!DOCTYPE html>
<html lang="en">

<head>

    @section('title')
        Sign up | LearnCode
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
                        <h1 class="mb-1 fw-bold">Sign up</h1>
                        <span>Already have an account?
								<a href="{{route('login')}}" class="ms-1">Sign in</a>
                        </span>
                    </div>
                    <!-- Form -->
                    <form role="form" method="POST" action="{{ route('register') }}">

                    @csrf
                    <!-- name -->
                        <div class="mb-3 {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" name="name" placeholder="Name" required  autofocus/>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>


                        <!-- Email -->
                        <div class="mb-3 {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" placeholder="Email address here" required />
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>



                        <!-- Password -->
                        <div class="mb-3 {{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="**************" required />
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>



                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="**************" required />
                        </div>


                        <!-- Checkbox -->
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheckRegister" />
                                <label class="form-check-label" for="customCheckRegister"><span>I agree to the <a href="#"> Terms of Service </a> and
								<a href="#">Privacy Policy.</a></span></label>
                            </div>
                        </div>
                        <div>
                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Create  Account
                                </button>
                            </div>
                        </div>
                        <hr class="my-4" />
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

