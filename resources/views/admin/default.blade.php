<!DOCTYPE html>
<html>

@include('admin.partials._head')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  @include('admin.partials._header')
  <!-- Main Header -->

  <!-- Left side column. contains the logo and sidebar -->



   <!--Sidebar -->
   @include('admin.partials._sidebar')
   <!-- Sidebar -->

  <!-- Content Wrapper. Contains page content -->
  @yield('content');
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
@include('admin.partials._footer')

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

 @include('admin.partials._footerjs')

</body>
</html>