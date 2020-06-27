@extends('Panel::layouts.dashboard.main')
{{-- title , body , image , specialty_id --}}
@section('content')
    <form class="row" method="post" action="{{route('dashboard.projects.update',$project)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white">Main Info</h3>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">


                            <div class="col-md-12">
                                <fieldset class="form-group mb-2">
                                    <label class="mb-1" for="title">Project Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required
                                           placeholder="Enter Project Title" value="{{$project->title}}">
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="color" class="mb-1">Content</label>
                                    <textarea class="form-control" name="body" id="body"
                                              placeholder="Enter Content">{{$project->title}}</textarea>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white">Specialty</h3>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="text-bold-500 font-medium-2 mb-1">
                            Select Category
                        </div>
                        <div class="form-group">
                            <select class="select2 form-control" id="specialty_id" name="specialty_id">
                                @foreach($specialties as $specialty)
                                    <option @if ($specialty->id == $project->specialty->id)
                                            selected
                                            @endif

                                            value="{{$specialty->id}}">{{$specialty->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="white">Project Image</h3>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @if($project->image !=null and !empty($project->image))
                            <img id="image" src="{{asset('storage/'.$project->image)}}" alt="" class="ing-fluid mb-2">
                        @else
                            <img id="image" src="https://via.placeholder.com/300x300" alt="" class="ing-fluid mb-2">
                        @endif
                        <div class="custom-file">
                            <input id="image-uploader" value="" name="image" type="file"
                                   class="form-control border-0 custom-file-input">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Submit Button --}}
        <div class="col-md-12">
            <button type="submit" class="btn btn-success col-12 py-2">Update Project</button>
        </div>
    </form>
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/forms/select/select2.min.css">
@endsection
@section('script')
    <script src="{{asset('/')}}app-assets/vendors/js/forms/select/select2.full.min.js"></script>

    <script>
        $(document).ready(function () {

            ClassicEditor
                .create(document.querySelector('#body'), {
                    width: "auto",
                    height: "auto",
                    language: "en",
                    placeholder: 'Type the content here!'
                })
                .catch(error => {
                    console.error(error);
                });


            function readURL(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $('#image').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#image-uploader").change(function () {
                readURL(this);
            });

            // Basic Select2 select
            $("#specialty_id").select2({
                // the following code is used to disable x-scrollbar when click in select input and
                // take 100% width in responsive also
                dropdownAutoWidth: true,
                width: '100%'
            });


        });
        /**/
    </script>
@endsection
