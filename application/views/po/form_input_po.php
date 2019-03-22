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
                <h3 class="card-title">Input Data Purchase Order</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php foreach ($dataspl->result() as $key):?>
              <div class="card-body">
                <form action="http://localhost/pembelian/index.php/po/action_add_detail" method="post">
                  <!-- text input -->
                  
                   <div class="form-group"> 
                <label class="control-label col-xs-3" >Id Permintaan</label>
                      <div class="col-xs-8">
                        <input type="text" class="form-control" name="id_permintaan" value="<?php echo $key->id_permintaan ?>" readonly>
                        </div>
                    </div>
                    <?php endforeach ?>

                <div class="form-group">
                  <label class="control-label col-xs-3" >Spare Part</label>
                  <select name="id_sparepart" class="form-control">
                  <option value='0'>--pilih spare part --</option>
                    <?php 
                    foreach ($sparepart->result_array() as $key) {
                    echo "<option value='$key[id_sparepart]'>$key[id_sparepart]</option>";
                    } 
                    ?>
                  </select> 
                </div>

                <div class="form-group">
                    <label>Jumlah Beli</label>
                    <input type="text" class="form-control" name="qty" required>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" >
                </div>

                
                <div class="form-group"> 
              <!--<label class="control-label col-xs-3" >Status</label>-->
                        <div class="col-xs-8">
                        <input type="hidden" class="form-control" name="status" value="waiting" readonly>
                        </div>
                </div>

                    
                
    </div>
    </div>
    <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  
  </form>
  
</div>
</div>
</div>
</div>
</div>
