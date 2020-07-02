<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('Panel::dashboard._partials.head')
{{----}}
<body class="vertical-layout vertical-menu-modern semi-dark-layout @yield('body-class', '2-columns navbar-floating footer-static')"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
@include('Panel::dashboard.inc.header')
@include('Panel::dashboard.inc.sidebar')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="@yield('wrapper', 'content-wrapper')">

        <div class="content-body">
            @if(!isset($bread))
            {{--BREADCAMP START--}}
            @include('Panel::dashboard.inc.breadcrumbs')
            {{--BREADCAMP END--}}
            @endif
            @yield('content')
        </div>
    </div>
</div>
@include('Panel::dashboard.inc.footer')
@include('Panel::dashboard.inc.sidebar-voerlay')
@include('Panel::dashboard._partials.script')
<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@include("Panel::dashboard.inc.message")
</body>
</html>
