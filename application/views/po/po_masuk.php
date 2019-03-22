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

    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Laporan Pembelian</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <form class="form-horizontal" method="post" action="cetak_laporan">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tanggal awal</label>
                  
                        
                        <div class="col-xs-8">
                            <input type="date" data-format="yyyy-mm-dd" name="tgl_awal" class="form-control"  required>
                        </div>

                    </div>

                <!-- /.form-group -->
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tanggal akhir</label>
                  
                        
                        <div class="col-xs-8">
                            <input type="date" data-format="yyyy-mm-dd" name="tgl_akhir" class="form-control"  required>
                        </div>
                    </div>
                <!-- /.form-group -->
                
                <button type="submit" name="submit" class="btn btn-primary"> Lihat Laporan</button>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </form>
          <!-- /.card-body -->
          <div class="card-footer">
            Cetak laporan pembelian berdasarkan tanggal
          </div>
        </div>
      </div>
    </section>          

<!-- table PO -->
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data PO</h3>
            </div>
            
            <!-- /.card-header -->

            <div class="card-body">
               <div class="pull-right">
                  
                </div>
              </div>
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID PO</th>
                    <th>ID Supplier</th>
                    <th>Tanggal PO</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($dataspl->result() as $key): ?>
                  <tr>
                    <td><?php echo $key->id_po ?></td>
                    <td><?php echo $key->id_supplier ?></td>
                    <td><?php echo $key->tgl_po ?></td>
                    <td>
                      <?php 
                        echo "
                        ".anchor('Po/cetak_po/'.$key->id_po,'Cetak PO',array('class'=> 'btn btn-primary'))."
                        ".anchor('Po/tampil_detail_po/'.$key->id_po,'Detail',array('class'=> 'btn btn-secondary')).""
                      ?>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                </table>

                
               
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