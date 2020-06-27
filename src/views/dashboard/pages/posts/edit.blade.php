@extends('Panel::layouts.dashboard.main')


@section('content')
    <div class="content-body">
        <!-- Basic Inputs start -->
        <form id="post-form2"  method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input value="{{$post->id}}" name="data_id" style="display: none">
            <div class="row">


                {{-- Widgets ( 'Post Title' , Post Body , Seo Excerpt ) --}}
                <div class="col-md-8">


                    {{-- Post Title --}}
                    <div class="card col-md-12">
                        <div class="card-header text-center">
                            <h3>Title</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <fieldset class="form-group">
                                        <label class="mb-1" for="title">Post title</label>
                                        <input type="text" class="form-control" id="title" value="{{$post->title}}"
                                               name="title" required
                                               placeholder="Enter Posts Title">
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{--Post Body--}}
                    <div class="card col-md-12">
                        <div class="card-header text-center">
                            <h3>Content</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <fieldset class="form-group">
                                        <label class="mb-1" for="body">Post body</label>
                                        <textarea name="body" class="form-control" id="body">{!! $post->body !!} </textarea>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{--Post Excerpt--}}
                    <div class="card col-md-12">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="text-bold-500 font-medium-2 mb-1">
                                        Excerpt <br><small>(Max 100 word)</small>
                                    </div>

                                    <fieldset>
                                        <div class="input-group">

                                            <textarea class="form-control" placeholder="Seo Excerpt"
                                                      aria-label="Seo Excerpt"
                                                      name="excerpt" required> Excerpt : {{$post->excerpt}}</textarea>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


                {{-- Widgets ( 'Post Details' , Post Image , Seo Content ) --}}
                <div class="col-md-4">


                    {{-- Post Details --}}

                    <div class="card col-md-12">
                        <div class="card-header bg-primary text-center">
                            <h3 class="text-white">Post Details</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="col-md-12 mb-1">

                                    {{-- Post Slug --}}

                                    <fieldset>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="btn btn-primary" type="button">Enter Slug</span>
                                            </div>
                                            <input type="text" class="form-control" value="{{$post->slug}}"
                                                   placeholder="Slug" aria-label="Slug"
                                                   name="slug">
                                        </div>
                                    </fieldset>

                                </div>
                                <hr>

                                {{-- Post Category --}}

                                <div class=" col-12">
                                    <div class="text-bold-500 font-medium-2 mb-1">
                                        Select Category
                                    </div>
                                    <div class="form-group">
                                        <select class="select2 form-control" id="category" name="category_id">
                                            @foreach($categories as $category)
                                                <option @if ($category->id == $post->category->id)
                                                        selected
                                                        @endif

                                                        value="{{$category->id}}">{{$category->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Post Status --}}

                                <div class=" col-12">
                                    <div class="text-bold-500 font-medium-2 mb-1">
                                        Post Status
                                    </div>
                                    <div class="form-group">
                                        <select class="select2 form-control" id="published" name="status">
                                            <option @if ($post->status == 'published') selected @endif value="published">Published</option>
                                            <option @if ($post->status == 'pending') selected @endif value="pending">Pending</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Post Featured --}}

                                <div class="col-md-12">
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" value="1" @if ($post->featured == 1 ) checked @endif name="featured">
                                            <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                            <span class="">{{__('dashboard.featured')}}</span>
                                        </div>
                                    </fieldset>
                                </div>


                            </div>
                        </div>
                    </div>


                    {{-- Post Image --}}

                    <div class="card col-md-12">
                        <div class="card-header bg-primary text-center">
                            <h3 class="text-white">Post Image</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body text-center">


                                @if($post->image !=null and !empty($post->image))
                                    <img id="image" src="{{asset('storage/'.$post->image)}}" alt="" class="ing-fluid mb-2">
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

                    {{-- Seo Content --}}

                    <div class="card col-md-12">
                        <div class="card-header bg-primary text-center">
                            <h3 class="text-white">SEO Content</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">


                                {{-- Post Seo Title --}}
                                <div class="col-md-12 mb-1">
                                    <fieldset>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="btn btn-primary" type="button">Seo Title</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Seo Title" value="{{$post->seo_title}}"
                                                   aria-label="Seo Title"
                                                   name="seo_title">
                                        </div>
                                    </fieldset>
                                </div>
                                <hr>


                                {{-- Post Seo Description --}}
                                <div class="col-md-12 mb-1">
                                    <div class="text-bold-500 font-medium-2 mb-1">
                                        Seo Description
                                    </div>
                                    <fieldset>
                                        <div class="input-group">

                                            <textarea class="form-control" placeholder="Seo Description"
                                                      aria-label="Seo Description"
                                                      name="meta_description">{{$post->meta_description}}</textarea>
                                        </div>
                                    </fieldset>
                                </div>
                                <hr>


                                {{-- Post Seo Keywords --}}
                                <div class="col-md-12 mb-1">
                                    <div class="text-bold-500 font-medium-2 mb-1">
                                        Seo Keywords
                                    </div>
                                    <fieldset>
                                        <div class="input-group">

                                            <textarea class="form-control" placeholder="Seo Keywords"
                                                      aria-label="Seo Keywords"
                                                      name="meta_keywords">{{$post->meta_keywords}}</textarea>
                                        </div>
                                    </fieldset>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>


                {{-- Submit Button --}}
                <div class="col-md-12">
                    <button type="submit" id="forrm-update" class="btn btn-success col-12 py-2">Save Post</button>
                </div>
            </div>
        </form>
        <!-- Basic Inputs end -->
    </div>

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


            // Basic Select2 select
            $("#category").select2({
                // the following code is used to disable x-scrollbar when click in select input and
                // take 100% width in responsive also
                dropdownAutoWidth: true,
                width: '100%'
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

            $('#post-form2').submit(function (e) {
                e.preventDefault();
                let form = new FormData($("#post-form2")[0])
                form.append('image', $('#image').files);


                $.ajax({
                    type: "POST",
                    url: "{{route('dashboard.posts.update','id')}}",
                    data: form,
                    dataType:'JSON',
                    processData: false,
                    contentType: false,

                }).done(function (r) {
                    if (r.status == true) {
                        toastr.success('Post updated Successfully.', 'Status');
                    } else {
                        for(const [k , n] of Object.entries(r.errors)){
                            toastr.error(n, 'Validation');
                        }
                    }
                });

            });

        });


    </script>
@endsection
