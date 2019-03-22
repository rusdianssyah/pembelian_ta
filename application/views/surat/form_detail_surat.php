 <!DOCTYPE html>
<html> 
<head>
  <title>Data Detail Surat Jalan</title>
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
                <h3 class="card-title">Detail Surat Jalan</h3>
              </div>        
              <?php foreach ($dataspl->result() as $key): ?>
      <div class="card-body">
              
                <table class="table table-striped"> 
                  <tr>
                    <th>ID Surat Jalan</th>
                    <th><?php echo $key->id_surat ?></th>
                  </tr>
                  <tr>
                    <th>ID PO</th>
                    <th><?php echo $key->id_po ?></th>
                  </tr>
                  <tr>
                    <th>Tanggal Surat</th>
                     <th><?php echo $key->tgl_surat ?></th>
                  </tr>
                  <tr>
                    <th>No. Surat Supplier</th>
                    <th><?php echo $key->no_surat_supplier ?></th>
                  </tr>
                  <tr>
                    <th>Nama pengirim</th>
                    <th><?php echo $key->nama_pengirim ?></th>
                  </tr>
                  <?php endforeach ?>
                  <?php foreach ($dataspl2->result() as $key): ?>
                  <tr>
                    <th>Nama Supplier</th>

                    <th><?php echo $key->nama_supplier ?></th>
                  </tr>
                  <?php endforeach ?>
                   
                </table>
                
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
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                  </tr>
                   <?php $no = 0; if(!empty($dataspl1)){ foreach ($dataspl1->result() as $key) {$no++ ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $key->nama_sparepart?></td>
                    <td><?php echo $key->jumlah?></td>
                    <td><?php echo $key->keterangan?></td>
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
</body>
</html>