@extends('Panel::layouts.dashboard.main')


@section('content')
    <div class="content-body">
        <!-- Basic Inputs start -->
        <form id="basic-input" action="{{route('dashboard.categories.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Category</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <div class="form-group">
                                            <label for="name">Choose Parent</label>
                                            <select class="select2 form-control" name="parent_id">
                                                <option value="NULL">No Parent</option>
                                                @foreach($categories as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                                        </fieldset>
                                    </div>

                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="color">Color</label>
                                            <input type="color" class="form-control" name="color" id="color" placeholder="Enter Color">
                                        </fieldset>
                                    </div>


                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="image">Browse Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="image">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                            </div>
                                        </fieldset>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success col-8 offset-2 mb-4" type="submit">Create Category</button>
                    </div>
                </div>

            </div>

        </form>
        <!-- Basic Inputs end -->
    </div>
@endsection
