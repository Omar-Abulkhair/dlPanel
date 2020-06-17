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

@stop
@section('content')
    <!-- users list start -->
    <section class="content-body">
        <div class="col-12 text-right my-2">
            <a href="{{route('dashboard.roles.create')}}" class="btn btn-relief-primary text-right">Add New</a>
        </div>
        <table id="categories-table" class="display table table-striped responsive nowrap table-bordered" style="width:100%">
            <thead class="thead-light">
            <tr class="text-center">
                <th>#</th>
                <th>Name</th>
                <th>Guard</th>
                <th width="30%">Actions</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->guard_name}}</td>
                    <td width="20%">
                        <a href="{{route('dashboard.roles.edit',$role->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('dashboard.roles.destroy',$role->id)}}" class="d-inline-block" method="post">
                            {{ method_field('delete') }}
                            @csrf
                            <button class="btn btn-danger delete-btn" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-8 col-xs-offset-2 text-xs-center m-auto">
            {{$roles->links('Panel::layouts.dashboard.pagination')}}
        </div>

    </section>
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
                    Do You want to delete this role ?!!..
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Cancel</button>
                    <button type="button" id="delete-confirm" class="btn btn-danger waves-effect waves-light">Accept</button>
                </div>
            </div>
        </div>
    </div>
@endsection
