<?php $this->load->view ("user/header") ?>
<div class="super_container_inner">
<div class="super_overlay"></div>
        
<form action="" style="margin-top:80px">    
	<table>
             <tr>
                <td>No Pesanan</td>
                <td>:</td>
                <td><?php echo $getuser->no_pesanan?></td>
            </tr>
            <tr>
                <td>Tanggal Pesanan</td>
                <td>:</td>
                <td><?php echo $getuser->tgl_pesanan?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $getuser->nama?></td>
            </tr> 
            <tr>
                <td>Nomor Telepon</td>
                <td>:</td>
                <td><?php echo $getuser->no_tlp?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $getuser->email?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $getuser->alamat?></td>
            </tr>

        </table>

        <h1>Pesanan</h1>
        <table border="1" width="50%">
        <tr>
                <th>No </th>
                <th>Pesanan </th>
                <th>Jumlah </th>
                <th>Sub Total</th>
        </tr>     
        <?php 
        $no=1;
        $total=0;
        foreach($getpesanan as $pesanan){?>
        <tr>
                <td><?php echo $no;?> </td>
                <td><?php echo $pesanan->nama_detail?></td>
                <td><?php echo $pesanan->jml_detail?> </td>
                <td>Rp. <?php echo number_format($pesanan->sub_total, 0, ',', '.'); ?></td>
        </tr>
        <?php $no++; 
        $total=$total+$pesanan->sub_total;
        } ?>


        <tr>
                <th colspan="3" align="right">Total </th>
                <th>Rp. <?php echo number_format($total, 0, ',', '.'); ?></th>
        </tr> 
        </table>
        

	<!-- Features -->
		
        <div class="features">
	        <div class="container">
				
		</div>
        </div>
</div>

<?php $this->load->view ("user/footer")?>