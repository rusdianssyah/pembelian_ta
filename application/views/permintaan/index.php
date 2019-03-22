<!DOCTYPE html>
<html> 
<head>
  <title>Data Supplier</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/adminlte.min.css">  
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="<?php echo base_url(); ?>/assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>

<body class="hold-transition sidebar-mini"  >   
<div class="wrapper">   

              <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Permintaan Spare Part PT Nusa Indah Jaya Utama</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID Permintaan</th>
                    <th>Tanggal Permintaan</th>
                    <th>Laporan Kerusakan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($dataspl->result() as $key): ?>
                  <tr>
                    <td><?php echo $key->id_permintaan ?></td>
                    <td><?php echo $key->tgl_permintaan ?></td>
                    <td><?php echo $key->lap_kerusakan ?></td>
                    <td><?php echo $key->status ?></td>
                    <td>
                      <?php 
                        echo "
                        ".anchor('Permintaan/tampil_detail/'.$key->id_permintaan,'Detail',array('class'=> 'btn btn-default'))."
                        ".anchor('Permintaan/delete_minta/'.$key->id_permintaan,'Hapus',array('class'=> 'btn btn-danger')).""
                      ?>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                </table>
                
                <?php 
                echo "
                  ".anchor('Permintaan/add','Buat Permintaan',array('class'=> 'btn btn-primary')).""
              ?>
              </div>
            </div>
            </div>
            </div>






<!-- jQuery -->
<script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>/assets/https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
      <script>
              $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                  "paging": true,
                  "lengthChange": false,
                  "searching": false,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false
                });
              });
      </script>
</body>
</html>