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
        <div class="row">
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Kirim Po</h3>
              </div>
              <!-- /.card-header -->
              <?php echo $error;?>
      <?php 
         
         echo form_open_multipart('po/send_mail'); 
      ?> 
              <div class="card-body">
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="To:" required>
                </div>
                <div class="form-group">
                  <input name="subject" class="form-control" placeholder="Subject:" required>
                </div>
                <div class="form-group">
                    <textarea name="pesan" class="form-control" style="height: 300px">
                    </textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Lampiran
                    <input type="file" name="lampiran" required>
                  </div>
                  
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  
                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Kirim</button>
                </div>
                
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /. box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
