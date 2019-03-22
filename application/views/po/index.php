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
                  ".anchor('po/buat_po/'.$key->id_permintaan,'Buat PO',array('class'=> 'btn btn-primary'))."
                  ".anchor('po/selesai/'.$key->id_permintaan,'Selesai',array('class'=> 'btn btn-success'))."
                  ".anchor('po/tampil_detail_setuju/'.$key->id_permintaan,'Detail',array('class'=> 'btn btn-secondary')).""
            ?>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                </table>
                
                
              </div>
            </div>
            


<!-- table PO -->

 <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detail PO Spare Part PT Nusa Indah Jaya Utama</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                        <th>Id Permintaan</th>
                        <th>Id Sparepart</th>
                        <th>Jumlah</th>
                       <th>keterangan</th>
                        <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($datadetail->result() as $key): ?>
                  <tr>
                    <td><?php echo $key->id_permintaan ?></td>
                    <td><?php echo $key->id_sparepart ?></td>
                    <td><?php echo $key->qty ?></td>
                    <td><?php echo $key->keterangan ?></td>
                    <td> 
                <?php 
                      echo "
                      ".anchor('Po/delete_detail/'.$key->id_po_detail,'Hapus',array('class'=> 'btn btn-danger')).""
                ?>
                    </td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
                </table>
                <div class="pull-right">
                    <a class="btn btn-success" data-toggle="modal" data-target="#modal_add_new"> Selesai </a></div>
                </div>
                
                
              </div>
            </div>
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
                <h3 class="modal-title" id="myModalLabel">Konfirmasi PO</h3>
            </div>
            <form class="form-horizontal" method="post" action="http://localhost/pembelian/index.php/Po/action_add">
                <div class="modal-body">
                  <div class="form-group"> 
                <label class="control-label col-xs-3" >Id PO</label>
                        <div class="col-xs-8">
                        <input type="text" class="form-control" name="id_po" value="<?php echo $kode;?>" readonly>
                        </div>
                    </div>

                    <div class="form-group"> 
                  <label class="control-label col-xs-3" >Nama Supplier</label>
                      <div class="col-xs-8">
                  <select name="id_supplier" class="form-control">
                  <option value='0'>--Nama Supplier--</option>
                  <?php 
                    foreach ($supplier as $key) {
                    echo "<option value='$key[id_supplier]'>$key[nama_supplier]</option>";
                    } 
                    ?>
                  </select>
                  </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal PO</label>
                        <div class="col-xs-8">
                            <input type="date" data-format="yyyy-mm-dd" name="tgl_po" class="form-control"  required>
                        </div>
                    </div>
 
                    <div class="form-group"> 
              <!--<label class="control-label col-xs-3" >Status</label>-->
                        <div class="col-xs-8">
                        <input type="hidden" class="form-control" name="status" value="po" readonly>
                        </div>
                </div>

                    <div class="form-group"> 
<!--<label class="control-label col-xs-3" >Status</label>-->
                        <div class="col-xs-8">
                        <input type="hidden" class="form-control" name="status" value="pending" readonly>
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
        <!--END MODAL ADD BARANG-->
            

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