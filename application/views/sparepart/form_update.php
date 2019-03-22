
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
                <h3 class="card-title">Kelola Data Spare Part</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php foreach ($dataspl->result() as $key):?>
              <div class="card-body">
              <form action="http://localhost/pembelian/index.php/Sparepart/action_update/<?php echo $key->id_sparepart ?>" method="post">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Id Spare Part</label>
                    <input type="text" class="form-control" name="id_sparepart" value="<?php echo $key->id_sparepart ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama Spare Part</label>
                    <input type="text" class="form-control" name="nama_sparepart" value="<?php echo $key->nama_sparepart ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" class="form-control" name="satuan" value="<?php echo $key->satuan ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Spesifikasi</label>
                    <input type="text" class="form-control" name="spesifikasi" value="<?php echo $key->spesifikasi ?>" required>
                  </div>
              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>