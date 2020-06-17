@php
    $url=Request::url();
@endphp
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand"
                                            href="/html/ltr/vertical-menu-template-semi-dark/index.html">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Vuexy</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span>Main</span>
            </li>

            <li class="@if(\Request::segment('1')=="dashboard" and !\Request::segment(2)) active @endif"><a
                    href="{{route('dashboard.home')}}"><i class="feather icon-circle"></i><span
                        class="menu-item" data-i18n="dashboard">Dashboard</span></a>
            <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title"
                                                                                     data-i18n="User">User</span></a>
                <ul class="menu-content">
                    @can('browse users')

                        <li @if($url==route('dashboard.users.index')) class="active" @endif><a
                                href="{{route('dashboard.users.index')}}"><i class="feather icon-circle"></i><span
                                    class="menu-item" data-i18n="List">List</span></a>
                        </li>
                    @endcan
                    @can('browse roles')
                        <li @if($url==route('dashboard.roles.index')) class="active" @endif><a
                                href="{{route('dashboard.roles.index')}}"><i class="feather icon-circle"></i><span
                                    class="menu-item"
                                    data-i18n="New">User Groups</span></a>
                        </li>
                        @endcan
                        </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-home"></i><span class="menu-title"
                                                                                     data-i18n="Dashboard">Blog</span></a>
                <ul class="menu-content">
                    @can('browse categories')

                        <li class="@if(\Request::segment('2')=="categories") active @endif"><a
                                href="{{route('dashboard.categories.index')}}"><i class="feather icon-circle"></i><span
                                    class="menu-item" data-i18n="Analytics">Categories</span></a></li>
                    @endcan
                    @can('browse posts')

                        <li class="@if(\Request::segment('2')=="posts") active @endif"><a
                                href="{{route('dashboard.posts.index')}}"><i class="feather icon-circle"></i><span
                                    class="menu-item" data-i18n="Analytics">Posts</span></a></li>
                    @endcan
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="feather icon-briefcase"></i><span class="menu-title"
                                                                                          data-i18n="Dashboard">Portfolio</span></a>
                <ul class="menu-content">
                    @can('browse categories')
                        <li class="@if(\Request::segment('2')=="specialties") active @endif"><a
                                href="{{route('dashboard.specialties.index')}}"><i class="feather icon-circle"></i><span
                                    class="menu-item" data-i18n="Analytics">Specialties</span></a></li>
                    @endcan
                    @can('browse posts')

                        <li class="@if(\Request::segment('2')=="projects") active @endif"><a
                                href="{{route('dashboard.projects.index')}}"><i class="feather icon-circle"></i><span
                                    class="menu-item" data-i18n="Analytics">Projects</span></a></li>
                    @endcan
                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="feather icon-settings"></i><span class="menu-title"
                                                                                          data-i18n="Dashboard">Setting</span></a>
                <ul class="menu-content">
                    @can('browse settings')
                        <li class="@if(\Request::segment('2')=="settings" and \Request::segment('3')==null) active @endif"><a
                                href="{{route('dashboard.settings.index')}}"><i class="feather icon-circle"></i><span
                                    class="menu-item" data-i18n="Analytics">View</span></a></li>
                    @endcan
                    @can('add settings')

                        <li class="@if(\Request::segment('2')=="settings" and \Request::segment('3')=="create") active @endif"><a
                                href="{{route('dashboard.settings.create')}}"><i class="feather icon-circle"></i><span
                                    class="menu-item" data-i18n="Analytics">Create</span></a></li>
                    @endcan
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
