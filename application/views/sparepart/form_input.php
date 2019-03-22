
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
                <h3 class="card-title">Input Data Spare Part</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <form action="http://localhost/pembelian/index.php/Sparepart/action_add" method="post">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Nama Spare Part</label>
                    <input type="text" class="form-control" name="nama_sparepart" required>
                  </div>
                  <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" class="form-control" name="satuan" required>
                  </div>
                  <div class="form-group">
                    <label>Spesifikasi</label>
                    <textarea class="form-control" rows="2" name="spesifikasi" required></textarea>
                  </div>
              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    