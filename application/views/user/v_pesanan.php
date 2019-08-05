<?php $this->load->view ("user/header") ?>
<section class="fillter_latest_product">
    <div class="container">
        <div class="col-md-6" style="border:thin dashed green;">
            <div class="row">
                <div class="col-md-4">
                    <label>No. Pesanan</label>
                </div>
                <div class="col-md-4">
                    : <?php echo $getuser->no_pesanan?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Tanggal Pesanan</label>
                </div>
                <div class="col-md-4">
                    : <?php echo $getuser->tgl_pesanan?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Nama</label>
                </div>
                <div class="col-md-4">
                    : <?php echo $getuser->nama?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>No. Telp</label>
                </div>
                <div class="col-md-4">
                    : <?php echo $getuser->no_tlp?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Email</label>
                </div>
                <div class="col-md-4">
                    : <?php echo $getuser->email?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Alamat</label>
                </div>
                <div class="col-md-4">
                    : <?php echo $getuser->alamat?>
                </div>
            </div>
        </div>
        
                <h1>Pesanan</h1>
                <table class="table table-bordered" width="50%">
                <tr align="center">
                        <th>No </th>
                        <th>Pesanan </th>
                        <th>Jumlah </th>
                        <th>Sub Total</th>
                </tr>     
                <?php 
                $no=1;
                $total=0;
                foreach($getpesanan as $pesanan){?>
                <tr align="center">
                        <td><?php echo $no;?> </td>
                        <td><?php echo $pesanan->nama_detail?></td>
                        <td><?php echo $pesanan->jml_detail?> </td>
                        <td>Rp. <?php echo number_format($pesanan->sub_total, 0, ',', '.'); ?></td>
                </tr>
                <?php $no++; 
                $total=$total+$pesanan->sub_total;
                } ?>


                <tr align="center">
                        <th colspan="3" align="right">Total </th>
                        <th>Rp. <?php echo number_format($total, 0, ',', '.'); ?></th>
                </tr> 
                </table>
                


<?php $this->load->view ("user/footer")?>