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
               <div class="card-footer">
                
                </div>
              </div>
            </div>
          </div>
          </div>
          </div>
            <?php 
                echo "
                  ".anchor('po/po_masuk/'.$key->id_po,'Kembali',array('class'=> 'btn btn-success')).""
            ?>
        </div>
  </div>  

</body>
</html>