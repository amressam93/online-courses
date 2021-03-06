@extends('layouts.webiste.master')

@section('title') {{$user->name}} | LearnCode @endsection

@section('css')

<style>
    .profile_image_form{
        display:none;
    }


    .display_none_btn{
        display:none;
    }
</style>


@endsection

@section('content')

    <div class="pt-5 pb-5">
        <div class="container">
            <!-- User info -->
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <!-- Bg -->
                    <div class="pt-16 rounded-top-md" style="
								background: url({{URL::asset('website/assets/images/background/profile-bg.jpg')}}) no-repeat;background-size: cover;"></div>
                    <div
                        class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom-md shadow-sm">
                        <div class="d-flex align-items-center">
                            <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">

                                <div class="uploaded_image_page_header">

                                @if($user->photo)
                                    <img src="/images/{{$user->photo->filename}}" class="avatar-xl rounded-circle border border-4 border-white" alt="{{$user->name}}">
                                @else
                                    <img src="/images/cases/default_user.png" class="avatar-xl rounded-circle border border-4 border-white" alt="{{$user->name}}">
                                @endif

                                </div>
                            </div>
                            <div class="lh-1">
                                <h2 class="mb-0" id="profile_name_user">
                                    {{$user->name}}
                                </h2>

                            </div>
                        </div>
                        <div>
                            <a href="{{route('my-courses')}}" class="btn btn-outline-primary btn-sm d-none d-md-block">Go to Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- Side navbar -->
                    <nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
                        <!-- Menu -->
                        <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
                        <!-- Button -->
                        <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="fe fe-menu"></span>
                        </button>
                        <!-- Collapse navbar -->
                        <div class="collapse navbar-collapse" id="sidenav">
                            <div class="navbar-nav flex-column">
                                <span class="navbar-header">Subscription</span>
                                <!-- List -->
                                <ul class="list-unstyled ms-n2 mb-4">
                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('my-courses')}}"><i class="fe fe-calendar nav-icon"></i>My Courses</a>
                                    </li>

                                </ul>
                                <span class="navbar-header">Account Settings</span>
                                <!-- List -->
                                <ul class="list-unstyled ms-n2 mb-0">
                                    <!-- Nav item -->
                                    <li class="nav-item {{ request()->is('profile') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{route('profile')}}"><i class="fe fe-settings nav-icon"></i>Edit Profile</a>
                                    </li>

                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fe fe-refresh-cw nav-icon"></i>Social
                                            Profiles</a>
                                    </li>

                                    <!-- Nav item -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="javascript:void(0);" onclick="$('#logout-form').submit();">
                                            <i class="fe fe-power nav-icon"></i>
                                            Sign Out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Profile Details</h3>
                            <p class="mb-0">
                                You have full control to manage your own account setting.
                            </p>

                            <p class="mb-0" id="profile_image_success_message" style="color:green;font-weight:bold"></p>

                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-lg-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mb-4 mb-lg-0">

                                    <div class="uploaded_image">

                                            @if($user->photo)
                                                <img src="/images/{{$user->photo->filename}}" id="img-uploaded" class="avatar-xl rounded-circle" alt="{{$user->name}}" />
                                            @else
                                                <img src="/images/cases/default_user.png" id="img-uploaded" class="avatar-xl rounded-circle" alt="{{$user->name}}" />
                                            @endif

                                    </div>

                                    <div class="ms-3">
                                        <h4 class="mb-0">Your Profile Image</h4>
                                        <p class="mb-0">
                                            PNG or JPG no bigger than 800px wide and tall.
                                        </p>
                                    </div>
                                </div>
                                <div>

                                    <a href="" id="upload_profile_image_btn" class="btn btn-outline-white btn-sm">Upload</a>

                                    <form method="POST" action="{{route('update-profile-image')}}" enctype="multipart/form-data" class="profile_image_form" id="profile_image_form">
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                        <input type="file" name="profile_image" class="form-control profile_image" id="resume">
                                    </form>

{{--                                    <a href="#" class="btn btn-outline-white btn-sm">Update</a>--}}

                                    <span id = "image_profile_show_delete_btn">
                                      <a href="#"  id="delete_profile_image_btn"  class="btn btn-outline-danger btn-sm {{$user->photo ? '' : 'display_none_btn'}}">Delete</a>
                                    </span>
                                </div>
                            </div>
                            <hr class="my-5" />
                            <div>

                                @include('flash-message')

                                <p class="mb-2">
                                    You're a Member Since <strong>{{$user->created_at->diffForHumans()}}</strong>
                                </p>

                                <p class="mb-2">
                                    Your Score (<strong style="color:#754ffe">{{$user->score}}</strong> Points)
                                </p>

                                <p class="mb-4" id="profile_email_user">
                                    Your Email Address (<strong>{{$user->email}}</strong>) is <span class="badge bg-{{ $user->email_verified_at ? 'success' : 'danger' }} me-4">{{$user->email_verified_at ? 'Verified' : 'Unverified'}}</span>
                                </p>


                                <h4 class="mb-0">Personal Details</h4>
                                <p class="mb-4">
                                    Edit your personal information and address.
                                </p>

                                <p class="mb-2" style="color:green;font-weight:bold" id="profile_info_success_message"></p>

                                <div id="validation-errors"></div>

                                <!-- Form -->
                                <form class="row" method="POST" action="/profile" id="profile_form">
                                    @csrf
                                    <!--  name -->
                                    <div class="mb-3 col-12 col-md-6 ">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}" placeholder="Name"   />

                                            <span style="color:red" id="name_validation"></span>
                                    </div>

                                    <!-- Address -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="email">Email Address</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}" placeholder="Email Address"   />

                                        <span style="color:red" id="email_validation"></span>
                                    </div>

                                    <!-- password  -->
                                    <div class="mb-3 col-12 col-md-6 password-field" id="new_password">
                                        <label class="form-label" for="password">New Password</label>
                                        <input id="password" type="password" name="password" class="form-control mb-2" placeholder="Password"  />

                                        <span style="color:red" id="password_validation"></span>

                                        <br>
                                        <em class="help-block">A minimum 6 characters password contains a combination of <strong>uppercase and lowercase letter</strong> and <strong>number</strong>.</em>
                                        <div class="row align-items-center g-0">
                                            <div class="col-6">
                                              <span data-bs-toggle="tooltip" data-placement="right" title="Test it by typing a password in the field below. To reach full strength, use at least 6 characters, a capital letter and a digit, e.g. 'Test01'">
                                                  Passwordstrength
                                               <i class="fas fa-question-circle ms-1"></i>
                                              </span>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- password  -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password"  />
                                        <span style="color:red" id="password_confirmation_validation"></span>
                                    </div>

                                    <div class="col-12">
                                        <!-- Button -->
                                        <button class="btn btn-primary" type="submit" name="save">
                                            Update Profile
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('footer')
    @include('layouts.webiste.footers.sub_footer')
@endsection

@section('js')

<script>

    $(function(){

        delete_image()

        $('#upload_profile_image_btn').on('click',function(e){

            e.preventDefault();

            if($('#upload_profile_image_btn').attr('class') != "btn btn-primary btn-sm")
            {
                $(".profile_image").trigger('click');
            }
            else
            {
                // form submit
                $("#profile_image_form").submit()
            }

        });


        $(".profile_image").on('change',function(){

            let image_value = $(this).val();

            $('#upload_profile_image_btn').html("<i class='fas fa-cloud-upload-alt'></i> Save Image");

            $('#upload_profile_image_btn').attr("class","btn btn-primary btn-sm");
        });


    });


    // Profile Image Form Submit Ajax

    $("#profile_image_form").on('submit',function(e){

        e.preventDefault();

        //console.log($(".profile_image").val())

        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('#token').val()
            }
        })


        $.ajax({

            url: "{{route('update-profile-image')}}",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){

                $("#profile_image_success_message").text(data.message);
                setTimeout(function(){$("#profile_image_success_message").hide();},10000);
                $("#profile_image_success_message").show();
                $(".uploaded_image").html(data.uploaded_image);
                $(".uploaded_image_page_header").html(data.uploaded_image_page_header);
                $('#upload_profile_image_btn').html("Upload");
                $('#upload_profile_image_btn').attr("class","btn btn-outline-white btn-sm");
                $("#image_profile_show_delete_btn").html(' <a href="#"  id="delete_profile_image_btn"  class="btn btn-outline-danger btn-sm">Delete</a>')
                delete_image()
                //window.location.reload();

            }



        })

    });




    // delete profile image Ajax
    function delete_image() {
        $('#delete_profile_image_btn').on('click',function(e){

            e.preventDefault();

            $.ajax(
                {
                    url: "{{route('delete-profile-image')}}",
                    type: 'DELETE',
                    data: {

                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (data){

                        $("#profile_image_success_message").text(data.message);
                        setTimeout(function(){$("#profile_image_success_message").hide();},5000);
                        window.setTimeout(function(){location.reload()},1000);
                        $("#profile_image_success_message").show();

                    }
                });

        });
    }



    // user info submit form ajax
    $("#profile_form").on('submit',function(e){

        e.preventDefault();

        $.ajax({

            url: "{{route('update-profile-image')}}",
            type: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){


                // empty password input
                $('#password').val('');

                // empty confirmation password input
                $('#password_confirmation').val('');

                // update email profile user.
                $('#profile_email_user').html('');
                $('#profile_email_user').append('Your Email Address (<strong>'+`${data.email}`+'</strong>) is <span class="badge bg-{{ $user->email_verified_at ? "success" : "danger" }} me-4">{{$user->email_verified_at ? "Verified" : "Unverified"}}</span>');


                // update name profile user.
                $('#profile_name_user').text('');
                $('#profile_name_user').text(data.name);



                // empty validation message.
                $('#name_validation').html('');

                $('#email_validation').html('');

                $('#password_validation').html('');

                $('#password_confirmation_validation').html('');


                // empty progress bar password Strengh after Request Ajax.
                $("#new_password").removeClass("password-field");
                $("#new_password").addClass("password-field");



                // show success message.
                $("#profile_info_success_message").text(data.message);
                setTimeout(function(){$("#profile_info_success_message").hide();},10000);
                $("#profile_info_success_message").show();
                //window.location.reload();

            },
            error: function (xhr) {
                $('#validation-errors').html('');

                $.each(xhr.responseJSON.errors, function(key,value) {
                   // $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div>');


                    // full validation message.

                    // Name validation
                    if(xhr.responseJSON.errors.name)
                    {
                        $('#name_validation').html('');

                       // $('#name_validation').append('<strong>'+ xhr.responseJSON.errors.name + '</strong>');

                        xhr.responseJSON.errors.name.forEach((q) =>{            // foreach for email errors
                            $('#name_validation')
                                .append('<strong>'+ q +'<br>'+ '</strong>');
                        })
                    }
                    else
                    {
                        $('#name_validation').html('');
                    }

                    // email validation
                    if(xhr.responseJSON.errors.email)
                    {
                        $('#email_validation').html('');

                       // $('#email_validation').append('<strong>'+ xhr.responseJSON.errors.email + '</strong>');

                        xhr.responseJSON.errors.email.forEach((q) =>{            // foreach for email errors
                            $('#email_validation')
                                .append('<strong>'+ q +'<br>'+ '</strong>');
                        })
                    }

                    else
                    {
                        $('#email_validation').html('');
                    }

                    // password validation
                    if(xhr.responseJSON.errors.password)
                    {

                        $('#password_validation').html('');

                        //$('#password_validation').append('<strong>'+ xhr.responseJSON.errors.password + '</strong>');

                        xhr.responseJSON.errors.password.forEach((q) =>{            // foreach for password errors
                            $('#password_validation')
                                .append('<strong>'+ q +'<br>'+ '</strong>');
                        })

                    }

                    else
                    {
                        $('#password_validation').html('');
                    }


                    // password confirmation validation
                    if(xhr.responseJSON.errors.password_confirmation)
                    {

                        $('#password_confirmation_validation').html('');

                        //$('#password_confirmation_validation').append('<strong>'+ xhr.responseJSON.errors.password + '</strong>');

                        xhr.responseJSON.errors.password_confirmation.forEach((q) =>{            // foreach for password errors
                            $('#password_confirmation_validation')
                                .append('<strong>'+ q +'<br>'+ '</strong>');
                        })

                    }

                    else
                    {
                        $('#password_confirmation_validation').html('');
                    }



                });
            }



        })

    });



</script>

@endsection

