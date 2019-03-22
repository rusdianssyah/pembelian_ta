
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
                <h3 class="card-title">Kelola Data Supplier</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php foreach ($dataspl->result() as $key):?>
              <div class="card-body">
              <form action="http://localhost/pembelian/index.php/Supplier/action_update/<?php echo $key->id_supplier ?>" method="post">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Id Supplier</label>
                    <input type="text" class="form-control" name="id_supplier" value="<?php echo $key->id_supplier ?>"readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama Supplier</label>
                    <input type="text" class="form-control" name="nama_supplier" value="<?php echo $key->nama_supplier ?>">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" rows="3" name="alamat" value="<?php echo $key->alamat ?>"></textarea>
                  </div>
                  <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" class="form-control" name="no_tlp" value="<?php echo $key->no_tlp ?>">
                  </div>
                  <div class="form-group">
                    <label>Fax</label>
                    <input type="text" class="form-control" name="fax" value="<?php echo $key->fax ?>">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $key->email ?>">
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