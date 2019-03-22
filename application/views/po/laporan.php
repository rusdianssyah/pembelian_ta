
   
              
<table>
    <tr>
        <td>
          <img src="<?php echo base_url(); ?>/assets/images/icons/niju.jpg">
        </td>
                <td>    
                    PT Nusa Indah Jaya Utama <br>
                   Jl. Laskar Raya No. 49 RT. 003 RW. 002
                    Kel. Pekayon Jaya, Kec. Bekasi Selatan
              <br>
                    Telp. 021-82411782 / 021-8201008
                </td>
                <td >
                </td>
            </tr>
        </table>
<br>
<br>
                <table class="table table-bordered" >
                  <tr >
                    <th colspan="5">Tanggal cetak Laporan : </th>
                     <th><?php
                $tgl=date('d-m-Y');
                echo $tgl;
                ?></th>
                  </tr>
                  
                  
                </table>
                  <!-- </td>
                <td colspan="4" ><?php
                $tgl=date('d-m-Y');
                
                ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="4" ><?php
                $tgl=date('d-m-Y');
                echo $tgl;
                ?></td> -->
                
     
      </tr>
      
            <center><h2>Laporan Pembelian Spare Part PT Nusa Indah Jaya Utama </h2></center>
       
</table>    
                <table class="table table-striped" border="1">
                  
                 <tr>
                    <th><center>No</th>
                    <th><center>Id PO</th>
                    <th><center>Tanggal PO</th>
                    <th><center>Id Permintaan</th>
                    <th><center>Nama Spare Part</th>
                    <th><center>Nama Supplier</th>
                    <th><center>Jumlah Beli</th>
                    
                  </tr>
                  
                <?php $no = 0; if(!empty($datapo)){ foreach ($datapo->result() as $key) {$no++ ?>
                  <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td width="100"><?php echo $key->id_po ?></td>
                    <td width="150"><center><?php echo $key->tgl_po ?></center></td>
                    <td width="100"><center><?php echo $key->id_permintaan ?></td>
                    <td width="150"><?php echo $key->nama_sparepart ?></td>
                    <td width="150"><?php echo $key->nama_supplier ?></td>
                    <td><center><?php echo $key->qty ?></center></td>
                    
                  </tr>
                <?php } } ?>

                <!-- <tr>
                    <td colspan="8"><b><center>Sub total</td>

                  </tr> -->
                </table>