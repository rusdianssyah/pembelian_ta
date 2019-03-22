
<!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
   <link rel="stylesheet" href="<?php echo base_url();?>/assets//dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  
<div class="card-header">
               <!-- Main content -->
    <section class="content"> 
      <div class="container-fluid"> 
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Data Permintaan Spare Part</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <form action="http://localhost/pembelian/index.php/Permintaan/action_add_detail" method="post">
                  <!-- text input -->
                  <div class="form-group">
                  <select name="id_sparepart" class="form-control">
                  <option value='0'>--pilih spare part --</option required>
                    <?php 
                    foreach ($sppart as $key) {
                    echo "<option value='$key[id_sparepart]'>$key[nama_sparepart]</option>";
                    }
                    ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" required>
                  </div>
                  
                  <div class="form-group">
                    <label>Keterangan Tambahan</label>
                    <input type="text" class="form-control" name="keterangan" >
                  </div>
                  </div>
              </div>
              <div class="form-group"> 
              <!--<label class="control-label col-xs-3" >Status</label>-->
                        <div class="col-xs-8">
                        <input type="hidden" class="form-control" name="status" value="waiting" readonly>
                        </div>
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <div class="pull-right">
                    <a class="btn btn-success" data-toggle="modal" data-target="#modal_add_new"> Selesai </a></div>
                </div>
              </form>
            </div>

    <div class="container">
      <h2>Data permintaan spare part</h2>
            <table class="table table-bordered table-striped" id="mydata">
            <thead>

                  <tr>
                        <td>Nama Spare Part</td>
                        <td>Jumlah</td>
                        <td>Keterangan</td>
                        <td>Aksi</td>
                  </tr>
            </thead>
                  <?php foreach ($dataspl->result() as $key): ?>
                  <tr>
                    <td><?php echo $key->nama_sparepart ?></td>
                    <td><?php echo $key->jumlah ?></td>
                    <td><?php echo $key->keterangan ?></td>
                    <td>
                    <?php 
                      echo "
                      ".anchor('Permintaan/delete_detail/'.$key->id_permintaan_detail,'Hapus',array('class'=> 'btn btn-danger')).""
                    ?>
                    </td>
                  </tr> 
                  <?php endforeach ?>
            </thead>
        </table>
    </div>



<!-- ============ MODAL ADD =============== -->    
    <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div>
                <h3 class="modal-title" id="myModalLabel">Permintaan Baru</h3>
            </div>
            <form class="form-horizontal" method="post" action="action_add">
                <div class="modal-body">
                  <div class="form-group"> 
                <label class="control-label col-xs-3" >Id Permintaan</label>
                        <div class="col-xs-8">
                        <input type="text" class="form-control" name="id_permintaan" value="<?php echo $kode;?>" readonly>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Permintaan</label>
                        <div class="col-xs-8">
                            <input type="date" data-format="yyyy-mm-dd" name="tgl_permintaan" class="form-control"  required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Laporan Kerusakan</label>
                        <div class="col-xs-8">
                            <textarea name="lap_kerusakan" class="form-control" rows="3" placeholder="Laporan kerusakan..."></textarea>
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
      </div>
    </div>
  </div>
</div>
        <!--END MODAL ADD BARANG-->
 
<script src="<?php echo base_url().'assets/js/jquery-2.2.4.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
