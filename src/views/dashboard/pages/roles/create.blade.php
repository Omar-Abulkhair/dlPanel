@extends('Panel::layouts.dashboard.main')

@section('style')

@stop
@section('script')

@stop
@section('content')
    <section class="content-body">
        <div class="row">
            <form action="{{route('dashboard.roles.store')}}" method="post" class="col-md-12 mb-4">
                @csrf
                <div class="card">
                    <div class="card-header border">
                        <h3>Role Info:- </h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="col-md-12 mb-4">
                                <fieldset>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button disabled type="button"
                                                    class="btn btn-primary waves-effect waves-light"
                                                    style="min-width: 145px;">
                                                Role name
                                            </button>
                                        </div>
                                        <input type="text" class="form-control" name="name"
                                               aria-label="role-name">
                                    </div>
                                </fieldset>
                            </div>
                            {{--<div class="col-md-12">
                                <fieldset>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button disabled type="button"
                                                    class="btn btn-primary waves-effect waves-light"
                                                    style="min-width: 145px;">
                                                Guard name
                                            </button>
                                        </div>
                                        <input type="text" class="form-control" name="guard_name"
                                               aria-label="guard-name">
                                    </div>
                                </fieldset>
                            </div>--}}
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Permissions</h3>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    @foreach($permissions as $value)
                                        <div class="col-md-6 mb-2">
                                            <fieldset>
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" name="permissions[]"
                                                            value="{{$value->id}}">
                                                    <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                    <span>{{ucfirst($value->name)}}</span>
                                                </div>
                                            </fieldset>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-success col-md-12">Save</button>
                </div>
            </form>
        </div>
    </section>
@endsection
