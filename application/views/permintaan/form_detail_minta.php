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
                <?php foreach ($dataspl->result() as $key): ?>
                <h3 class="card-title">Detail Permintaan dengan id permintaan <?php echo $key->id_permintaan ?></h3>
              </div> 
              <div class="card-body">       
             
              
                <table class="table table-striped">

                  <tr>
                    <th>ID Permintaan</th>
                     <th><span style="font-weight:normal;"><?php echo $key->id_permintaan ?></th>
                  </tr>
                  <tr>
                    <th>Tanggal Permintaan</th>
                     <th><span style="font-weight:normal;"><?php echo $key->tgl_permintaan ?></th>
                  </tr>
                  <tr>
                    <th>Laporan Kerusakan</th>
                    <th><span style="font-weight:normal;"><?php echo $key->lap_kerusakan ?></th>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <th><span style="font-weight:normal;"><?php echo $key->status ?></th>
                  </tr>
                </span>
              </div>
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
                    <th><center>Jumlah Permintaan</center></th>
                  </tr>
            <?php $no = 0; if(!empty($dataspl1)){ foreach ($dataspl1->result() as $key) {$no++ ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $key->nama_sparepart ?></td>
                    <td><center><?php echo $key->jumlah ?></center></td>
                  </tr>
                <?php } } ?>
                </table>
               </div>
              </div>
            </div>
          </div>
        </div>
  </div>

  </div>
   </div>
  


</body>
</html>