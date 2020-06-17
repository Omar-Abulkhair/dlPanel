@extends('Panel::layouts.dashboard.main')

@section('style')

@stop
@section('script')

@stop
@section('content')
    <!-- users list start -->
    <section class="content-body">
        <div class="col-12 text-right my-2">
            <a href="{{route('dashboard.projects.create')}}" class="btn btn-relief-primary text-right">Add New</a>
        </div>
        <table id="categories-table" class="display table table-striped responsive nowrap table-bordered" style="width:100%">
            <thead class="thead-light">
            <tr class="text-center">
                <th>#</th>
                <th>Name</th>
                <th width="30%">Actions</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach($projects as $project)
                <tr>
                    <td>{{$project->id}}</td>
                    <td>{{$project->title}}</td>
                    <td width="20%">
                        <a href="{{route('dashboard.projects.edit',$project)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('dashboard.projects.destroy',$project)}}" class="d-inline-block" method="post">
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
            {{$projects->links('Panel::layouts.dashboard.pagination')}}
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
