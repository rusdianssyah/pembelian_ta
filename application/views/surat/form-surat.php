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
                <h3 class="card-title">Detail PO</h3>
              </div>        
              <div class="card-body">
              <?php foreach ($datapo->result() as $key): ?>
                <table class="table table-striped">
                  <tr>
                    <th>ID Purchase Order</th>
                     <th><span style="font-weight:normal;"><?php echo $key->id_po ?></th>
                  </tr>
                  <tr>
                    <th>Tanggal Purchase Order</th>
                     <th><span style="font-weight:normal;"><?php echo $key->tgl_po ?></th>
                  </tr>
                  <?php endforeach ?>
                  <?php foreach ($datapo2->result() as $key): ?>
                  <tr>
                    <th>Nama Supplier</th> 
                    <th><span style="font-weight:normal;"><?php echo $key->nama_supplier ?></th>
                  </tr>
                  
                </table>
                <?php endforeach ?>
                <br>
                <div class="card card-secondary">
                <div class="card-header">
                
                <h3 class="card-title">Spare Part yang diminta</h3>
              </div>   
              <div class="card-body table-responsive p-0">

                <table class="table table-hover">
                  
                 <tr>
                  <th>No</th>
                    <th>Nama Spare Part</th>
                    <th>Jumlah Permintaan</th>
                  </tr>
                <?php $no = 0; if(!empty($datapo1)){ foreach ($datapo1->result() as $key) {$no++ ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $key->nama_sparepart ?></td>
                    <td><?php echo $key->qty ?></td>
                  </tr>
                <?php } } ?>
                </table>
               </div>
               </div>
               <div class="pull-right">
            <a class="btn btn-success" data-toggle="modal" data-target="#modal_add_new"> Input Surat Jalan </a></div>
               <div class="card-footer">
                
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
                <h3 class="modal-title" id="myModalLabel">Konfirmasi Surat Jalan</h3>
            </div>
            
              <?php 
          echo form_open ('surat/action_add');
          ?>
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
                      <label class="control-label col-xs-3" >Id Supplier</label>
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


</body>
</html>