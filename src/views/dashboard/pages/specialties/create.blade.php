@extends('Panel::layouts.dashboard.main')
@section('content')
    <div class="content-body">
        <form action="{{route('dashboard.specialties.store')}}" method="post">
            @csrf
            <div class="row">

                <div class="card col-md-12">
                    <div class="card-header text-center">
                        <h3>Name</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="col-md-12">
                                <fieldset class="form-group mb-2">
                                    <label class="mb-1" for="title">Specialty Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                           placeholder="Enter Specialty Name">
                                </fieldset>

                                <fieldset class="form-group">
                                    <label for="color" class="mb-1">Color</label>
                                    <input type="color" class="form-control" name="color" id="color"
                                           placeholder="Enter Color">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success col-12 py-2 waves-effect waves-light">Save</button>


            </div>
        </form>
    </div>
@endsection
