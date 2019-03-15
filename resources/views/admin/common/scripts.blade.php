
<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('admin/assets/js/jquery-2.1.4.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="{{ asset('admin/assets/js/jquery-1.11.3.min.js') }}"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="{{ asset('admin/assets/js/excanvas.min.js') }}"></script>
<![endif]-->
<script src="{{ asset('admin/assets/js/jquery-ui.custom.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.sparkline.index.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.flot.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.flot.pie.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.flot.resize.min.js') }}"></script>

<!-- ace scripts -->
<script src="{{ asset('admin/assets/js/ace-elements.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/ace.min.js') }}"></script>