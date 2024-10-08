<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" sizes="16x16" type="image/x-icon" href="{{ url('images/favicon.ico') }}" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Tech2Globe | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('admin/css/adminlte.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ url('admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ url('landing_page/css/style.css') }}">
  <!-- CodeMirror -->
  {{-- <link rel="stylesheet" href="{{ url('admin/plugins/codemirror/codemirror.css') }}">
  <link rel="stylesheet" href="{{ url('admin/plugins/codemirror/theme/monokai.css') }}"> --}}
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('admin/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ url('admin/plugins/toastr/toastr.min.css') }}">

  <!-- jQuery -->
  <script src="{{ url('admin/plugins/jquery/jquery.min.js') }}"></script>

  
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ url('admin/img/tech2globe-logo.png') }}" alt="AdminLTELogo" width="50%" height="100">
  </div> --}}

  @include('admin.layout.header')

  @include('admin.layout.sidebar')

  @yield('content')

 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  @include('admin.layout.footer')
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap -->
<script src="{{ url('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ url('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('admin/js/adminlte.js') }}"></script>

{{-- Custom js --}}
<script src="{{ url('admin/js/custom.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ url('admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ url('admin/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ url('admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ url('admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ url('admin/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ url('admin/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('admin/js/pages/dashboard2.js') }}"></script>

{{-- Datatable & Plugin --}}
<script src="{{ url('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
{{-- <script src="{{ url('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-buttons/js/buttons.buttons.min.js') }}"></script> --}}
<!-- Select2 -->
<script src="{{ url('admin/plugins/select2/js/select2.full.min.js') }}"></script>

<!-- CodeMirror -->
{{-- <script src="{{ url('admin/plugins/codemirror/codemirror.js') }}"></script>
<script src="{{ url('admin/plugins/codemirror/mode/css/css.js') }}"></script>
<script src="{{ url('admin/plugins/codemirror/mode/xml/xml.js') }}"></script>
<script src="{{ url('admin/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script> --}}
<!-- Summernote -->
<script src="{{ url('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ url('admin/plugins/toastr/toastr.min.js') }}"></script>

<script>

  $(function () {
    $('#fileManagement').DataTable({
        "order": [[0, "desc"]]
    });
    $("#portfolio").DataTable({  
    });
    $("#users").DataTable({  
    });
    $("#mainMenu").DataTable({
      
    });
    $("#subMenu").DataTable({  
    });
    $("#allPages").DataTable({  
    });
    $("#PagesCat").DataTable({  
    });
    $("#layout").DataTable({  
      "order": [[ 0, "desc" ]]
    });
    $('.select2').select2()
    $("#footerPages").DataTable({  
    });
    $("#footerSocialIcons").DataTable({  
    });
    $("#ourWorkBlog").select2({
      theme: "bootstrap-5",
      width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
      placeholder: $( this ).data( 'placeholder' ),
      closeOnSelect: false,
      allowClear: true,
    });
  });
</script>
<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
