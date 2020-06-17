@extends('Panel::layouts.dashboard.main')
@section('content')
    <div class="content-body">
        <!-- Basic Inputs start -->
        <form id="basic-input" action="{{route('dashboard.categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Category ({{$category->name}})</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <div class="form-group">
                                            <label for="name">Choose Parent</label>
                                            <select class="select2 form-control" name="parent_id">
                                                <option selected value="NULL">No Parent</option>
                                                @foreach($categories as $cat)
                                                    <option @if($cat->id==$category->parent_id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" value="{{$category->name}}" name="name" id="name" placeholder="Enter Name">
                                        </fieldset>
                                    </div>

                                    <div class="col-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="color">Color</label>
                                            <input type="color" class="form-control" value="{{$category->color}}" name="color" id="color" placeholder="Enter Color">
                                        </fieldset>
                                    </div>


                                    <div class="col-12">
                                        <fieldset class="form-group">
                                            <label for="image">Browse Image (Leave Empty To Keep it)</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image" id="image">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success col-8 offset-2 mb-4" type="submit">Save Category</button>
                    </div>
                </div>

            </div>

        </form>
        <!-- Basic Inputs end -->
    </div>
@endsection
