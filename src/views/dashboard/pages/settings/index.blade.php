@extends('Panel::layouts.dashboard.main')
@section('content')
    <!-- Basic and Outline Pills start -->
    <section id="basic-and-outline-pills">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card mb-2">
                    <div class="card-header">
                        <h4 class="card-title">Setting Board</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>
                                Choose Your <code>Tag</code>
                            </p>
                            <ul class="nav nav-pills">
                                @foreach($settings as $key=>$value)
                                    <li class="nav-item">
                                        <a class="nav-link" id="{{$key}}-tab" data-toggle="pill" href="#{{$key}}"
                                           aria-expanded="true">{{$key}}</a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="tab-content">
                    @foreach($settings as $key =>$value)
                        <div role="tabpanel" class="tab-pane" id="{{$key}}" aria-labelledby="{{$key}}-tab"
                             aria-expanded="true">
                            @foreach($value as $input)
                                <form class="row input-form" enctype="multipart/form-data"
                                      action="{{route('dashboard.settings.update',$input)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>{{$input->key}}</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    {{--Image--}}
                                                    @if($input->type == 'image')
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                {{Form::label('image','Image',['class'=>'mb-1'])}}
                                                                <button input-id="{{$input->id}}" class="btn btn-danger pull-right">Delete</button>
                                                            </div>
                                                        </div>

                                                        @if(!empty($input->value))
                                                            <img class="d-block mb-1" style="max-height: 200px"
                                                                 src="{{asset("storage/".$input->value)}}"
                                                                 alt="setting">
                                                        @else
                                                            <img class="d-block mb-1" style="max-height: 200px"
                                                                 src="//via.placeholder.com/200" alt="setting">
                                                        @endif
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                {{Form::file('image',['class'=>'form-control','id'=>$input->key])}}
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select name="tag" style="width: 100%"
                                                                            class="select2 form-control tag">
                                                                        @foreach($settings as $key1 =>$value1)
                                                                            <option @if($key1 == $input->tag) selected
                                                                                    @endif value="{{$key1}}">{{$key1}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{--Image--}}

                                                    @elseif($input->type == 'text')
                                                        <div class="row mb-2">
                                                            <div class="col-md-12">
                                                                {{Form::label($input->key,$input->key,['class'=>'mb-1'])}}
                                                                <button input-id="{{$input->id}}" class="btn btn-danger pull-right">Delete</button>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-8">
                                                                <input type="text" name="value" class="form-control"
                                                                       value="{{$input->value}}">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select name="tag" style="width: 100%"
                                                                            class="select2 form-control tag">
                                                                        @foreach($settings as $key1 =>$value1)
                                                                            <option @if($key1 == $input->tag) selected
                                                                                    @endif value="{{$key1}}">{{$key1}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @elseif($input->type == 'boolean')
                                                        <div class="row mb-2">
                                                            <div class="col-md-12">
                                                                {{Form::label($input->key,$input->key,['class'=>'mb-1'])}}
                                                                    <button input-id="{{$input->id}}" class="btn btn-danger pull-right">Delete</button>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-8">
                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <input type="radio" name="value"
                                                                               @if($input->value=="true") checked @endif
                                                                               value="true">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        <span class="">True</span>
                                                                    </div>
                                                                </fieldset>

                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <input type="radio" name="value"
                                                                               @if($input->value=="false") checked @endif
                                                                               value="false">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        <span class="">False</span>
                                                                    </div>
                                                                </fieldset>



                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select name="tag" style="width: 100%"
                                                                            class="select2 form-control tag">
                                                                        @foreach($settings as $key1 =>$value1)
                                                                            <option @if($key1 == $input->tag) selected
                                                                                    @endif value="{{$key1}}">{{$key1}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-12">
                <button class="btn btn-success pull-right" id="submit-inputs" onclick="submit_forms()">Submit</button>
            </div>

        </div>
    </section>
    <!-- Basic and Outline Pills end -->
    <form method="POST" id="delete-form" action="{{route('dashboard.settings.destroy','id')}}">
        @csrf
        @method('DELETE')
    </form>

@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/forms/select/select2.min.css">
@endsection
@section('script')
    <script src="{{asset('/')}}app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script>
        $('.tag').select2({
            tags: true
        });

        $('.nav-pills .nav-link').first().addClass('active');
        $('.tab-pane').first().addClass('active');


        function submit_forms() {
            $('.input-form').each(function () {
                let valuesToSend = new FormData($(this)[0]);
                $.ajax($(this).attr('action'), {
                    method: "POST",
                    data: valuesToSend,
                    cache: false,
                    contentType: false,
                    processData: false
                })
            });
        }

        $('.btn-danger').on('click',function (e) {
            e.preventDefault();

            let id=$(this).attr('input-id');
            let action=$('#delete-form').attr('action');
            $('#delete-form').attr('action',action.replace('id',id));
            $('#delete-form').submit();
        });

    </script>
@endsection
