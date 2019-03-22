














<table>
    <tr>
        <td>
          <img src="<?php echo base_url(); ?>/assets/images/icons/niju.jpg"
        </td>
                <td>    
                    PT Nusa Indah Jaya Utama <br>
                   Jl. Laskar Raya No. 49 RT. 003 RW. 002
                    Kel. Pekayon Jaya, Kec. Bekasi Selatan
              <br>
                    Telp. 021-82411782 / 021-8201008
                </td>
        </td>
      </tr>
      
            <center><h2>Purchase Order PT Nusa Indah Jaya Utama </h2></center>
       
</table>    
          <?php foreach ($dataspl->result() as $key): ?>
                <table class="table table-bordered" >
                  <tr>
                    <th>ID Purchase Order   : </th>
                     <th><span style="font-weight:normal;"><?php echo $key->id_po ?></th>
                  </tr>
                  <tr>
                    <th>Tanggal Purchase Order  :</th>
                     <th><span style="font-weight:normal;"><?php echo $key->tgl_po ?></th>
                  </tr>
                  <?php endforeach ?>
                  <?php foreach ($datapo2->result() as $key): ?>
                  <tr>
                    <th>Nama Supplier   :</th>
                    <th><span style="font-weight:normal;"><?php echo $key->nama_supplier ?></th>
                  </tr>
                  
                </table>
                <?php endforeach ?>
                <br>
                <br>
                <label><h3>Data pesanan spare part</h3></label>
             

                <table class="table table-hover" border="1">
                  
                 <tr>
                    <th>No</th>
                    <th>Nama Spare Part</th>
                    <th>Jumlah Permintaan</th>
                    <th>Keterangan</th>
                    
                  </tr>
                <?php $no = 0; if(!empty($dataspl1)){ foreach ($dataspl1->result() as $key) {$no++ ?>
                  <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td width="200"><?php echo $key->nama_sparepart ?></td>
                    <td width="150"><center><?php echo $key->qty ?></center></td>
                    <td width="150"><?php echo $key->keterangan ?></td>
                   
                  </tr>
                <?php } } ?>
                </table>
               