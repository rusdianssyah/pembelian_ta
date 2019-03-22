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
              <h3 class="card-title">Data Spare Part PT Nusa Indah Jaya Utama</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="sparepart" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID Sparepart</th>
                    <th>Nama Spare Part</th>
                    <th>Satuan</th>
                    <th>Spesifikasi</th>
                    <th>Kelola</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($dataspl->result() as $key): ?>
                  <tr>
                    <td><?php echo $key->id_sparepart ?></td>
                    <td><?php echo $key->nama_sparepart ?></td>
                    <td><?php echo $key->satuan ?></td>
                    <td><?php echo $key->spesifikasi ?></td>
                    <td>
                <?php 
                  echo "
                  ".anchor('Sparepart/update/'.$key->id_sparepart,'Ubah',array('class'=> 'btn btn-default'))."
                  ".anchor('Sparepart/delete/'.$key->id_sparepart,'Hapus',array('class'=> 'btn btn-danger')).""
                ?>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                </table>
                
                <?php 
                echo "
                  ".anchor('Sparepart/add/','Tambah Data',array('class'=> 'btn btn-primary')).""
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
                $("#sparepart").DataTable();
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