@extends('Panel::layouts.dashboard.main')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/pages/card-analytics.css">
@stop

@section('script')
    <script src="{{asset('/')}}app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="{{asset('/')}}app-assets/js/scripts/cards/card-statistics.js"></script>
@stop
@section('content')
    <div class="content-body">
        <!-- Statistics card section start -->
        <section id="statistics-card">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                    <div class="avatar-content">
                                        <i class="feather icon-book text-info font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700">{{$posts}}</h2>
                                <p class="mb-0 line-ellipsis">Posts</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                    <div class="avatar-content">
                                        <i class="feather icon-user text-info font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700">{{$users}}</h2>
                                <p class="mb-0 line-ellipsis">Users</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                    <div class="avatar-content">
                                        <i class="feather icon-user text-info font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700">36.9k</h2>
                                <p class="mb-0 line-ellipsis">Views</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Statistics Card section end-->

    </div>
@endsection
