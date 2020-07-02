@extends('Panel::layouts.dashboard.main')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/DataTable/dataTables.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/DataTable/responsive.bootstrap4.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/pages/app-user.css">

@stop
@section('script')

    <script type="text/javascript" src="{{asset('assets/js/DataTable/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/DataTable/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/DataTable/dataTables.responsive.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/DataTable/responsive.bootstrap4.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            /*$('#users-table').DataTable({
                "ajax":"{{route('dashboard.users.table')}}",
                "columns": [
                    { "data": "avatar",
                        "render":function (data, type, row) {
                        let href="{{asset('')}}"+data.replace(/^\/|\/$/g, '');
                        let img="<img style='width: 100px; border-radius: 50%;' class='user-avatar' src='"+href+"'>";
                            return img;
                        },
                        "orderable":false
                    },
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "id" },
                    { "data": "lastLogin" },
                    { "data": "active" }
                ]
            });*/
        });

    </script>
@stop
@section('content')
    <!-- users list start -->
    <section class="content-body">
        <div class="col-12 text-right my-2">
            <a href="{{route('dashboard.users.create')}}" class="btn btn-relief-primary text-right">Add New</a>
        </div>
        <table id="users-table" class="display table table-hover responsive nowrap" style="width:100%">
            <thead>
            <tr>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Last Login</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    @if(!empty($user->avatar))
                    <th><img style='width: 100px; border-radius: 50%;' class='user-avatar'
                             src='{{asset('/storage/'.$user->avatar)}}'></th>
                    @else
                        <th><img style='width: 100px; border-radius: 50%;' class='user-avatar'
                             src='/app-assets/images/portrait/small/avatar-s-17.jpg'></th>
                    @endif
                    <th>{{$user->name}}</th>
                    <th>{{$user->email}}</th>
                    @if(isset($user->roles[0]->name))
                        <th>{{$user->roles[0]->name}}</th>
                    @else
                        <th>No Role</th>
                    @endif
                    <th>{{$user->last_login}}</th>
                    <td width="20%" class="text-center">
                        <div class="btn-group">
                            <a href="{{route('dashboard.users.edit',$user->id)}}" class="btn btn-primary col-6">Edit</a>
                            <form action="{{route('dashboard.users.destroy',$user->id)}}" class="d-inline-block col-6"
                                  method="post">
                                {{ method_field('delete') }}
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger delete-btn" data-toggle="modal"
                                        data-target="#delete-modal" type="submit">Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="col-8 col-xs-offset-2 text-xs-center m-auto">
            {{$users->links('Panel::layouts.dashboard.pagination')}}
        </div>
    </section>
    <!-- users list ends -->


    <!-- users list ends -->
    <div class="modal fade text-left" id="delete-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger white">
                    <h5 class="modal-title" id="myModalLabel120">Delete Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do You want to delete this post ?!!..
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Cancel</button>
                    <button type="button" id="delete-confirm" class="btn btn-danger waves-effect waves-light">Accept</button>
                </div>
            </div>
        </div>
    </div>
@stop


