@if(\Request::segment(2))

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Develogs</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.'.Request::segment(2).".index")}}">{{ ucfirst(Request::segment(2)) }}</a>
                            </li>
                            @if(Request::segment(3)=="create")
                                <li class="breadcrumb-item"><a href="#">{{ ucfirst(Request::segment(3)) }}</a></li>
                            @elseif(is_numeric(Request::segment(3)) and (Request::segment(4))=="edit"  )
                                <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            @elseif(is_numeric(Request::segment(3)))
                                <li class="breadcrumb-item"><a href="#">View</a></li>
                            @else
                                <li class="breadcrumb-item"><a href="#">Browse</a></li>
                            @endif
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrum-right">
                <div class="dropdown">
                    <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="feather icon-settings"></i></button>
                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a
                            class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                </div>
            </div>
        </div>
    </div>
@endif
