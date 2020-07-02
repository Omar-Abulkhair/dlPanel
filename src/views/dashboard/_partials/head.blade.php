<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Develogs Admin Panel">
    <meta name="keywords"
          content="Web Development Company">
    <meta name="author" content="Develogs Team">
    <meta name="csrf-token" content="{{csrf_token()}}" />

    <title>Dashboard</title>


    <link rel="apple-touch-icon" href="{{asset('')}}app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/core/menu/menu-types/vertical-menu.css">
    <!-- End: Theme CSS-->


    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/plugins/extensions/toastr.css">
    <!-- END: Vendor CSS-->





    <!-- BEGIN: Page CSS-->
    @yield('style')
    <!-- END: Page CSS-->


    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->
