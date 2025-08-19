<!DOCTYPE html>
<html lang="en">
    <?php include('header.php');?>
    <?php include('../conf/config.php');?>
  <body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/Lambang_Kabupaten_Manggarai_Barat.png" alt="DESA COAL" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include('navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php include('logo.php');?>

    <!-- Sidebar -->
    <?php include('sidebar.php');?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('content_header.php');?>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php
   

   if (isset($_GET['page'])) {
       switch ($_GET['page']) {
           case 'dashboard':
               include('dashboard.php');
               break;
          }
      } else {
          include('dashboard.php');
      }
  ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('foother.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

</body>
</html>
