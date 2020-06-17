@extends('Panel::layouts.dashboard.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Form wizard with step validation section start -->
            <section id="validation">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Setting Input Builder</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{route('dashboard.settings.store')}}" method="post" id="setting-input-builder-form"
                                          class="steps-validation wizard-circle">
                                        @csrf
                                        <!-- Step 1 -->
                                        <h6><i class="step-icon feather icon-home"></i> Input Info</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="key" class="font-medium-1">
                                                            Key <small>(setting('tag.key'))</small>
                                                        </label>
                                                        <input type="text" class="form-control required" id="key"
                                                               name="key">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tag">
                                                            Tag
                                                        </label>
                                                        <select name="tag" id="tag" required
                                                                class="select2-customize-result form-control">
                                                            {{-- TODO://Foreach all ditenct tags --}}
                                                            @foreach($tags as $tag)
                                                                <option value="{{$tag}}">{{$tag}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Step 2 -->
                                        <h6><i class="step-icon feather icon-briefcase"></i> Input Data</h6>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">

                                                        <label for="tag">
                                                            Type
                                                        </label>
                                                        <select name="type" id="type" required
                                                                class="select2-customize-result form-control">
                                                            @foreach($types as $type)
                                                                <option value="{{$type}}">{{$type}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <textarea id="options-text" class="col-md-12" style="height: 140px;"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <textarea id="options" name="options" class="col-md-12 disabled" style="height: 140px;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--<div class="col-md-12">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>--}}
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Form wizard with step validation section end -->
        </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.0.0/jsoneditor.min.css">
@endsection
@section('script')
    <script src="{{asset('/')}}app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="{{asset('/')}}app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="{{asset('/')}}app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="{{asset('/')}}js/plugins/objgen.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsoneditor/9.0.0/jsoneditor.min.js"></script>

    <script>


        // Wizard tabs with numbers setup
        $(".number-tab-steps").steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: 'Submit'
            },
            onFinished: function (event, currentIndex) {
                alert("Form submitted.");
            }
        });

        // Wizard tabs with icons setup
        $(".icons-tab-steps").steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: 'Submit'
            },
            onFinished: function (event, currentIndex) {
                alert("Form submitted.");
            }
        });

        // Validate steps wizard

        // Show form
        var form = $("#setting-input-builder-form").show();

        $("#setting-input-builder-form").steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: 'Submit'
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                // Allways allow previous action even if the current form is not valid!
                if (currentIndex > newIndex) {
                    return true;
                }

                // Needed in some cases if the user went back (clean up)
                if (currentIndex < newIndex) {
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function (event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                $("#setting-input-builder-form").submit();
            }
        });

        // Initialize validation
        $("#setting-input-builder-form").validate({
            ignore: 'input[type=hidden]', // ignore hidden fields
            errorClass: 'danger',
            successClass: 'success',
            highlight: function (element, errorClass) {
                $(element).removeClass(errorClass);
            },
            unhighlight: function (element, errorClass) {
                $(element).removeClass(errorClass);
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
            rules: {
                email: {
                    email: true
                }
            }
        });

        $('#tag').select2({
            tags: true
        });

        $('#options-text').keyup(function () {
            let text=$('#options-text').val();
            var json =ObjGen.xJson(text,{numSpaces: 1})
            let options=$('#options').html(json);
            console.log(json)
        });


    </script>
@endsection
