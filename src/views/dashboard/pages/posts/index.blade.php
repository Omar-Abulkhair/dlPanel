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
            <a href="{{route('dashboard.posts.create')}}" class="btn btn-relief-primary text-right">Add New</a>
        </div>
        <table id="categories-table" class="display table table-striped responsive nowrap table-bordered" style="width:100%">
            <thead class="thead-light">
            <tr class="text-center">
                <th>Title</th>
                <th width="10%">Excerpt</th>
                <th>Author</th>
                <th>Category</th>
                <th>Image</th>
                <th>Status</th>
                <th width="30%">Actions</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->excerpt}}</td>
                    <td>{{$post->author->name}}</td>
                    <td>{{$post->category->name}}</td>


                    @if(!empty($post->image) and $post->image !=null)
                        <td><img height="50px" src="{{asset('storage/'.$post->image)}}"></td>
                    @else
                        <td><img src="https://via.placeholder.com/50"></td>
                    @endif

                    <td>{{$post->status}}</td>

                    <td width="20%">
                        <a href="{{route('dashboard.posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('dashboard.posts.destroy',$post->id)}}" class="d-inline-block" method="post">
                            {{ method_field('delete') }}
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger delete-btn" data-toggle="modal" data-target="#delete-modal" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="col-8 col-xs-offset-2 text-xs-center m-auto">
            {{$posts->links('Panel::layouts.dashboard.pagination')}}
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
                    Do You want to delete this post ?!!..
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Cancel</button>
                    <button type="button" id="delete-confirm" class="btn btn-danger waves-effect waves-light">Accept</button>
                </div>
            </div>
        </div>
    </div>
@endsection
