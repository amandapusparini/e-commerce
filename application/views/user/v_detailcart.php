<?php $this->load->view ("user/header") ?>
<!--================Shopping Cart Area =================-->
        <section class="shopping_cart_area p_100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart_product_list">
                            <h3 class="cart_single_title">Daftar Pesanan</h3>
                            <div class="table-responsive-md">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Pesana</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Sub total</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
			                            $no = 1;
			                            $total = 0;
			                            foreach ($this->cart->contents() as $items){
			                                $gambar = $items['image'];
			                                $nama = $items['name'];
			                                $harga = $items['price'];
			                                $jumlah = $items['qty'];
			                                $subtotal = $items['subtotal'];
			                                $total = $total + $subtotal;
			                        ?>
                                        <tr>
                                            <th scope="row">
                                                <img src="<?php echo base_url('assets/user') ?>/img/icon/close-icon.png" alt="" onclick="deleteItem('<?php echo $items['id'];?>','<?php echo $jumlah;?>')">
                                            </th>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="<?php echo base_url('assets/uploads/files'."/".$gambar) ?>" alt="" width="100">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4><?php echo $nama?></h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><p>Rp.<?php echo number_format($harga, 0, ',', ' '); ?></p></td>
                                            <td><?php echo $jumlah ?></td>
                                            <td><p>Rp. <?php echo number_format($subtotal, 0, ',', '.'); ?></p></td>
                                            <td><p>
                                        		<div class="quantity">
							                        <div class="custom">
							                        <!-- <form action="<?php //echo base_url('Makanan/tambahMakanan') ?>" method="post"> -->
							                            <button onclick="var result = document.getElementById('jml<?php echo $items['id'];?>'); var jml<?php echo $items['id'];?> = result.value; if( !isNaN( jml<?php echo $items['id'];?> ) &amp;&amp; jml<?php echo $items['id'];?> > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
							                            <input type="text" name="jml<?php echo $items['id'];?>" id="jml<?php echo $items['id'];?>" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							                            <button onclick="var result = document.getElementById('jml<?php echo $items['id'];?>'); var jml<?php echo $items['id'];?> = result.value; if( !isNaN( jml<?php echo $items['id'];?> )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>
							                        </div>
							                        <a class="add_cart_btn" href="#" onclick="tambahPesanan('<?php echo $items['id'] ?>')">Tambah</a>
							                        <!-- <input type="hidden" name="id_detail" id="id_detail" value="<?php //echo $getdetail->id_detail ?>"> -->
							                        <!-- <input type="submit" name="" class="add_cart_btn" value="Tambah"> -->
							                        <!-- </form> -->
							                    </div>
                                            </p></td>
                                        </tr>
                                    <?php }?>
                                        <tr>
                                        	<td><p></p></td>
                                        	<td><p></p></td>
                                        	<td><p></p></td>
                                        	<td><p><b>Total</b></p></td>
                                        	<td><p>Rp. <?php echo number_format($total, 0, ',', '.'); ?></p></td>
                                        	<?php if($total!=""){?>
                                        	<td><p><a href="<?php echo base_url('Review/reviewProduk'); ?>"  class="btn btn-success">Check Out</a></p></td>
                                        	<?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<script type="text/javascript">
function tambahPesanan(id_detail){
    var jml = $("#jml"+id_detail).val();
    // var id_detail = $("#jml").val();
    // $str = $("#tambahDetail").find('input').serialize();

     // alert(jml);
    $.ajax({
        url: "<?php echo base_url('Makanan/tambahMakanan');?>",
        type: "POST",
        data: "jml="+jml+"&id_detail="+id_detail,
        datatype: "json",
        success:function(data){
            // alert("berhasil");
            location.reload();
            // console.log(data);
        }
    });
    
}

function deleteItem(id_detail, jml){
	// alert(jml);
	$.ajax({
        url: "<?php echo base_url('Makanan/kurangMakanan');?>",
        type: "POST",
        data: "id_detail="+id_detail+"&jml="+jml,
        datatype: "json",
        success:function(data){
            // alert("berhasil");
            // console.log(data);
            location.reload();
        }
    });
}
</script>
        <!--================End Shopping Cart Area =================-->
<?php $this->load->view ("user/footer")?>