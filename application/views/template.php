<?php
        $conn = mysqli_connect('localhost','root','','dbpembelian');
    ?> 
    <?php 
   //Manajer
    $cari = mysqli_query($conn, "SELECT sum(id_permintaan=0) as notif FROM tb_permintaan where status = 'pending'");
    $notif = mysqli_fetch_array($cari);
    //purchasing valid
    $cari2 = mysqli_query($conn, "SELECT sum(id_permintaan=0) as notif2 FROM tb_permintaan where status = 'Valid'");
    $notif2 = mysqli_fetch_array($cari2);
    //purchasing valid
    $cari3 = mysqli_query($conn, "SELECT sum(id_permintaan=0) as notif3 FROM tb_permintaan where status = 'tolak'");
    $notif3 = mysqli_fetch_array($cari3);

    ?>
<html> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Pembelian PT NIJU</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/select2/select2.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datepicker/datepicker3.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="<?php echo base_url(); ?>/assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  
</head>
<?php
    $akses=$this->session->userdata('level_user');
    ?> 
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar q -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links q-->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links q-->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
         
          <i class="fa fa-sign-out"><a href="http://localhost/pembelian/index.php/Login/logout">Logout </i></a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo q-->
    <!-- <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url(); ?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <!-- <span class="brand-text font-weight-light">Admin</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>/assets/dist/img/niju.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a  class="d-block">PT NIJU</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo site_url('Home');?>" class="nav-link activee">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Menu Utama
              </p>
            </a>
            
          </li>
          <?php if ($akses['level_user']=='purchasing' or $akses['level_user']=='admin') 
            { 
                ?> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa fa-archive"></i>
              <p>
                Data Master
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Supplier');?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Data Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Sparepart');?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Data Spare Part</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <?php 
            }
            ?>  
            <?php if ($akses['level_user']=='maintenance' or $akses['level_user']=='admin') 
            { 
                ?> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-check-square"></i>
              <p>
                Permintaan Pembelian
                <i class="fa fa-angle-left right"></i><!-- <span class="label label-primary pull-right"><?php echo $notif['notif']; ?></span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Permintaan');?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>Buat Permintaan
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Permintaan/index_tolak');?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>Permintaan Ditolak
                  <span class="label label-primary pull-right"><?php echo $notif3['notif3']; ?></span>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Permintaan/index_setuju');?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>Permintaan Disetujui
                  
                </a>
              </li>
            </ul>
           <?php 
            }
            ?> 
             <?php if ($akses['level_user']=='manajer' or $akses['level_user']=='admin') 
            { 
                ?>   
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-check-square"></i>
              <p>
                Validasi
                <i class="fa fa-angle-left right"></i><span class="label label-primary pull-right"><?php echo $notif['notif']; ?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Validasi');?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>Permintaan Pembelian
                  <span class="label label-primary pull-right"><?php echo $notif['notif']; ?></span>
                </a>

                 


              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Validasi/tampil_setuju');?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Permintaan disetujui</p>
                </a>
              </li>
            </ul>
          </li>
          <?php 
            }
            ?> 
            <?php if ($akses['level_user']=='purchasing' or $akses['level_user']=='admin') 
            { 
                ?> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Pembelian
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('Po');?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>Buat PO

                  <span class="label label-primary pull-right"><?php echo $notif2['notif2']; ?></span>
                </a>
              </li>
                
              <li class="nav-item">
                <a href="<?php echo site_url('Po/po_masuk');?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Cetak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Po/kirim_email');?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Kirim PO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('Surat');?>" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Surat Jalan</p>
                </a>
              </li>
            </ul>
          </li>
          <?php 
            }
            ?>
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content container-->
    <?php $this->load->view($container)?>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-alpha
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>/assets/https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url(); ?>/assets/https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>/assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>/assets/https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>/assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>/assets/plugins/fastclick/fastclick.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>/assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>/assets/dist/js/demo.js"></script>
</body>
</html>
