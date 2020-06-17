<!-- BEGIN: Vendor JS-->
<script src="{{asset('/')}}app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->



<!-- BEGIN: Theme JS-->
<script src="{{asset('/')}}app-assets/js/core/app-menu.js"></script>
<script src="{{asset('/')}}app-assets/js/core/app.js"></script>
<script src="{{asset('/')}}app-assets/js/scripts/components.js"></script>
<script src="{{asset('/')}}app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="{{asset('/')}}app-assets/js/scripts/extensions/toastr.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
<script src="{{asset('/')}}js/custom.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
@yield('script')
<!-- END: Page JS-->
