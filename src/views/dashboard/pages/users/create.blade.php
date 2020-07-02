@extends('Panel::layouts.dashboard.main')
@section('content')
    <section class="content-body">
        <div class="row">
            <form action="{{route('dashboard.users.store')}}" method="post" class="col-md-12 mb-4">
                @csrf
                <div class="card">
                    <div class="card-header border">
                        <h3>Role Info:- </h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <fieldset>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button disabled type="button"
                                                        class="btn btn-primary waves-effect waves-light"
                                                        style="min-width: 145px;">
                                                    Name
                                                </button>
                                            </div>
                                            <input type="text" class="form-control" name="name"
                                                   aria-label="role-name" required>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <fieldset>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button disabled type="button"
                                                        class="btn btn-primary waves-effect waves-light"
                                                        style="min-width: 145px;">
                                                    Username
                                                </button>
                                            </div>
                                            <input type="text" class="form-control" name="username"
                                                   aria-label="role-name" required>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <fieldset>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button disabled type="button"
                                                        class="btn btn-primary waves-effect waves-light"
                                                        style="min-width: 145px;">
                                                    Email
                                                </button>
                                            </div>
                                            <input type="email" class="form-control" name="email"
                                                   aria-label="role-name" required>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <fieldset>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button disabled type="button"
                                                        class="btn btn-primary waves-effect waves-light"
                                                        style="min-width: 145px;">
                                                    Password
                                                </button>
                                            </div>
                                            <input type="password" class="form-control" name="password"
                                                   aria-label="role-name" required>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <fieldset>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button disabled type="button"
                                                        class="btn btn-primary waves-effect waves-light"
                                                        style="min-width: 145px;">
                                                    Confirm Password
                                                </button>
                                            </div>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                   aria-label="role-name" required>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <fieldset>
                                        <div class="input-group">
                                            <div class="input-group-prepend mb-2">
                                                <button disabled type="button"
                                                        class="btn btn-danger text-bold-600 waves-effect waves-light"
                                                        style="min-width: 145px;">
                                                    Role Name :
                                                </button>
                                            </div>

                                            <select class="select2 form-control" id="role" name="role_id">
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <button class="btn btn-success col-md-12">Save User</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/forms/select/select2.min.css">
@endsection
@section('script')
    <script src="{{asset('/')}}app-assets/vendors/js/forms/select/select2.full.min.js"></script>

    <script>
        $("#role").select2({
            // the following code is used to disable x-scrollbar when click in select input and
            // take 100% width in responsive also
            dropdownAutoWidth: true,
            width: '100%'
        });
    </script>
@endsection
