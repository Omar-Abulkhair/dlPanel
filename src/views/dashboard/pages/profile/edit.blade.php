@extends('Panel::layouts.dashboard.main')
@section('body-class', '2-columns navbar-floating footer-static menu-expanded pace-done')
@section('wrapper', 'content-area-wrapper')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/plugins/forms/validation/form-validation.css">
@stop
@section('script')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.user-profile-form').on('submit',function (e) {
            e.preventDefault();
            let url= "{{route('dashboard.profile.update')}}";
            let data=$(this).serialize();
            $.post(url,data).done(function (r) {
                if (r.status==true){
                    toastr.success("Your Profile Updated Successfully");
                }else{
                    //TODO : Notification System
                }
            });
        });


        $('#user-profile-password').on('submit',function (e) {
            e.preventDefault();
            let url= "{{route('dashboard.profile.update')}}";
            let data=$(this).serialize();
            $.post(url,data).done(function (r) {
                if (r.status==true){
                    alert('Yeah');
                }else{
                    //TODO : Notification System
                }
            });
        });

    </script>
@stop
@php($bread=false)
@section('content')
    <!-- account setting page start -->
    <section id="page-account-settings">
        <div class="row">
            <!-- left menu section -->
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                            <i class="feather icon-globe mr-50 font-medium-3"></i>
                            General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                            <i class="feather icon-lock mr-50 font-medium-3"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                            <i class="feather icon-info mr-50 font-medium-3"></i>
                            Info
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                            <i class="feather icon-camera mr-50 font-medium-3"></i>
                            Social links
                        </a>
                    </li>
                </ul>
            </div>
            <!-- right content section -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                    <form id="updateAvatar" method="post" action="{{route('dashboard.profile.updateAvatar')}}" class="media" enctype="multipart/form-data">
                                        @csrf
                                        <a href="javascript: void(0);">
                                            @if($user->avatar)
                                            <img src="{{asset('/storage/'.$user->avatar)}}" id="profile-avatar-image" class="rounded mr-75" alt="profile image" height="64" width="64">
                                            @else
                                                <img src="/app-assets/images/portrait/small/avatar-s-17.jpg" id="profile-avatar-image" class="rounded mr-75" alt="profile image" height="64" width="64">
                                            @endif
                                        </a>
                                        <div class="media-body mt-75">
                                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                <label id="profile-avatar-btn" class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                                <input type="file" id="avatar" hidden name="avatar">
                                                <button class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                                            </div>
                                            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                    size of
                                                    800kB</small></p>
                                        </div>
                                    </form>
                                    <hr>
                                    <form validate id="user-profile-general" class="user-profile-form">
                                        <input type="hidden" name="type" value="general">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-username">Username</label>
                                                        <input type="text" name="username" class="form-control" id="account-username" placeholder="Username" value="{{$user->username}}" required data-validation-required-message="This username field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-name">Name</label>
                                                        <input type="text" name="name" class="form-control" id="account-name" placeholder="Name" value="{{$user->name}}" required data-validation-required-message="This name field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-e-mail">E-mail</label>
                                                        <input type="email" name="email" class="form-control" id="account-e-mail" placeholder="Email" value="{{$user->email}}" required data-validation-required-message="This email field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            @if($user->email_verified_at==null)
                                                <div class="col-12">
                                                    <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        <p class="mb-0">
                                                            Your email is not confirmed. Please check your inbox.
                                                        </p>
                                                        <a href="javascript: void(0);">Resend confirmation</a>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                    <form validate id="user-profile-password" class="user-profile-form">
                                        <input type="hidden" name="type" value="password">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-old-password">Old Password</label>
                                                        <input type="password" name="old" class="form-control" id="account-old-password" required placeholder="Old Password" data-validation-required-message="This old password field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-new-password">New Password</label>
                                                        <input type="password" name="password" id="account-new-password" class="form-control" placeholder="New Password" required data-validation-required-message="The password field is required" minlength="6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-retype-new-password">Retype New
                                                            Password</label>
                                                        <input type="password" name="password_confirmation" class="form-control" required id="account-retype-new-password" data-validation-match-match="password" placeholder="New Password" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                    <form class="user-profile-form" id="user-profile-info" validate>
                                        <input type="hidden" name="type" value="info">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="accountTextarea">Bio</label>
                                                    <textarea name="about" class="form-control" id="accountTextarea" rows="3" placeholder="Your Bio data here..." >{{$user->about}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-birth-date">Birth date</label>
                                                        <input type="date" name="birthday" class="form-control birthdate-picker" value="{{$user->birthday}}" required placeholder="Birth date" id="account-birth-date" data-validation-required-message="This birthdate field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            {{--<div class="col-12">
                                                <div class="form-group">
                                                    <label for="languageselect2">Languages</label>
                                                    <select class="form-control" id="languageselect2" name="language" --}}{{--multiple="multiple"--}}{{-->
                                                        <option value="en" selected>English</option>
                                                        <option value="ar" selected>Arabic</option>
                                                    </select>
                                                </div>
                                            </div>--}}
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-phone">Phone</label>
                                                        <input type="text" name="phone" class="form-control" id="account-phone" required placeholder="Phone number" value="{{$user->phone}}" data-validation-required-message="This phone number field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-website">Website</label>
                                                    <input type="text" name="website" value="{{$user->website}}" class="form-control" id="account-website" placeholder="Website address">
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                    <form class="user-profile-form" id="user-profile-social" validate>
                                        <input type="hidden" name="type" value="social">
                                        {{--TODO :: Social--}}
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-twitter">Twitter</label>
                                                    <input type="text" name="twitter" id="account-twitter" class="form-control" placeholder="Add link" value="{{$user->socialMedia->twitter}}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-facebook">Facebook</label>
                                                    <input type="text" name="facebook" id="account-facebook" class="form-control" value="{{$user->socialMedia->facebook}}" placeholder="Add link">
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                    changes</button>
                                                <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                {{--<div class="tab-pane fade" id="account-vertical-connections" role="tabpanel" aria-labelledby="account-pill-connections" aria-expanded="false">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <a href="javascript: void(0);" class="btn btn-info">Connect to
                                                <strong>Twitter</strong></a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                            <h6>You are connected to facebook.</h6>
                                            <span>Johndoe@gmail.com</span>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="javascript: void(0);" class="btn btn-danger">Connect to
                                                <strong>Google</strong>
                                            </a>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                            <h6>You are connected to Instagram.</h6>
                                            <span>Johndoe@gmail.com</span>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                changes</button>
                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                    <div class="row">
                                        <h6 class="m-1">Activity</h6>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" checked id="accountSwitch1">
                                                <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                                <span class="switch-label w-100">Email me when someone comments
                                                                onmy
                                                                article</span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" checked id="accountSwitch2">
                                                <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                                                <span class="switch-label w-100">Email me when someone answers on
                                                                my
                                                                form</span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="accountSwitch3">
                                                <label class="custom-control-label mr-1" for="accountSwitch3"></label>
                                                <span class="switch-label w-100">Email me hen someone follows
                                                                me</span>
                                            </div>
                                        </div>
                                        <h6 class="m-1">Application</h6>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" checked id="accountSwitch4">
                                                <label class="custom-control-label mr-1" for="accountSwitch4"></label>
                                                <span class="switch-label w-100">News and announcements</span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="accountSwitch5">
                                                <label class="custom-control-label mr-1" for="accountSwitch5"></label>
                                                <span class="switch-label w-100">Weekly product updates</span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" checked id="accountSwitch6">
                                                <label class="custom-control-label mr-1" for="accountSwitch6"></label>
                                                <span class="switch-label w-100">Weekly blog digest</span>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                changes</button>
                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                        </div>
                                    </div>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account setting page end -->
@endsection
