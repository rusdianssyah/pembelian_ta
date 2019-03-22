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
              <h3 class="card-title">Data Purchase Order Spare Part PT Nusa Indah Jaya Utama</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id PO</th> 
                    <th>Id Supplier</th>
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
            
            <div>
                    <?php 
                echo "
                  ".anchor('surat/add1/'.$key->id_po,'Input Surat Jalan',array('class'=> 'btn btn-primary')).""
            ?>
                </div>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                </table>
                
                
              </div>
            </div>
            



                
                
             <!-- ============ MODAL ADD =============== -->    
    <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>

            <div>
                <h3 class="modal-title" id="myModalLabel">Konfirmasi Surat Jalan</h3>
            </div>
            <form class="form-horizontal" method="post" action="action_add">
                <div class="modal-body">
                  <div class="form-group"> 
                <label class="control-label col-xs-3" >Id Surat Jalan</label>
                      <div class="col-xs-8">
                        <input type="text" class="form-control" name="id_surat" value="<?php echo $kode;?>" readonly>
                        </div>
                    </div>

                    <div class="form-group"> 
                      <label class="control-label col-xs-3" >Id PO</label>
                        <div class="col-xs-8">
                        <input type="text" class="form-control" name="id_po" value="<?php echo $key->id_po ?>" readonly>
                        </div>
                    </div>

                  <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Surat</label>
                        <div class="col-xs-8">
                            <input type="date" data-format="yyyy-mm-dd" name="tgl_surat" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group"> 
                      <label class="control-label col-xs-3" >No Surat dari Supplier</label>
                        <div class="col-xs-8">
                        <input type="text" class="form-control" name="no_surat_supplier" required>
                        </div>
                    </div>

                  <div class="form-group"> 
                      <label class="control-label col-xs-3" >Nama Supplier</label>
                        <div class="col-xs-8">
                        <input type="text" class="form-control" name="id_supplier" value="<?php echo $key->id_supplier ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group"> 
                      <label class="control-label col-xs-3" >Nama Pengirim</label>
                        <div class="col-xs-8">
                        <input type="text" class="form-control" name="nama_pengirim" required>
                        </div>
                    </div>

                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
            </div>
            </div>
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