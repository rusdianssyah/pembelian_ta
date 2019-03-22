 <!DOCTYPE html>
<html> 
<head>
  <title>Data Permintaan Detail</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets//dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
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
                <h3 class="card-title">Detail Permintaan Belum Disetujui</h3>
              </div>    
              <div class="card-body">       
              <?php foreach ($dataspl->result() as $key): ?>
              
                <table class="table table-bordered">
                  <tr>
                    <th>ID Permintaan</th>
                     <th><span style="font-weight:normal;"><?php echo $key->id_permintaan ?></span></th>
                  </tr>
                  <tr>
                    <th>Tanggal Permintaan</th>
                     <th><span style="font-weight:normal;"><?php echo $key->tgl_permintaan ?></span></th>
                  </tr>
                  <tr>
                    <th>Laporan Kerusakan</th>
                    <th><span style="font-weight:normal;"><?php echo $key->lap_kerusakan ?></span></th>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <th><span style="font-weight:normal;"><?php echo $key->status ?></span></th>
                  </tr>
                  
                </table>
                <?php endforeach ?>
                <br>
              
                <div class="card card-secondary">
                <div class="card-header">
                
                <h3 class="card-title">Spare Part yang diminta</h3>
              </div>   
              <div class="card-body table-responsive p-0">
              </div>

                <table class="table table-hover">
                  
                 <tr> 
                    <th>No</th>
                    <th>Nama Spare Part</th>
                    <th><center>Jumlah Permintaan</center></th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                <?php $no = 0; if(!empty($dataspl1)){ foreach ($dataspl1->result() as $key) {$no++ ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $key->nama_sparepart ?></td>
                    <td><center><?php echo $key->jumlah ?></center></td>
                    <td><?php echo $key->keterangan ?></td>
                     <td>
                      <?php 
                echo "
                  ".anchor('validasi/delete_detail/'.$key->id_permintaan_detail,'Hapus',array('class'=> 'btn btn-danger'))."
                  
                  "?></td>
                  </tr>
                <?php } } ?>
                </table>
               </div>
               <div class="card-footer">
                
                </div>
              </div>
            </div>
          </div>
        </div>
            <?php 
                echo "
                  ".anchor('validasi/persetujuan/'.$key->id_permintaan,'Setujui',array('class'=> 'btn btn-success'))."
                  
                  "
            ?>
            <a class="btn btn-danger" data-toggle="modal" data-target="#modal_add_new"> Tolak </a></div>
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
                <h3 class="modal-title" id="myModalLabel">Alasan Tolak</h3>
            </div>
                <div class="modal-body">
                  <?php
echo form_open('validasi/tolak', "name='modal_popup'");
?>
                
 <div class="form-group"> 
                <div class="form-group"> 
                <label class="control-label col-xs-3" >Id Permintaan</label>
                        <div class="col-xs-8">
                        <input type="text" class="form-control" name="id_permintaan" value="<?php echo $key->id_permintaan ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Masukan Alasan Tolak Pembelian</label>
                        <div class="col-xs-8">
                            <textarea name="keterangan" class="form-control" rows="3" placeholder="Alasan Tolak..."></textarea>
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
</div>
</div>
</body>
</html>