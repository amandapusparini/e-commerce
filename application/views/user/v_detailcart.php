<?php $this->load->view ("user/header") ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/styles/cart.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/styles/cart_responsive.css">
<div class="super_container_inner">
		<div class="super_overlay"></div>

		

		<!-- Products -->
		<div class="cart_section products_row">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cart_container">
							
							<!-- Cart Bar -->
							<div class="cart_bar">
								<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
									<li class="mr-auto">Daftar Pesanan</li>
									
									<li style="width:10%;">Harga</li>
									<li>Jumlah</li>
									<li>Sub Total</li>
									<li></li>
								</ul>
							</div>
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
							<!-- Cart Items -->
							<div class="cart_items">
								<ul class="cart_items_list">

									<!-- Cart Item -->
									<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
										<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
											<div><div class="product_number"><?php echo $no; ?></div></div>
											<div><div class="product_image"><img src="<?php echo base_url('assets/uploads/files'."/".$gambar) ?>" alt=""></div></div>
											<div class="product_name_container">
												<div class="product_name"><a href="product.html"><?php echo $nama; ?></a></div>
												<div class="product_text"></div>
											</div>
										</div>
										<div class="product_price product_text" style="width:10% !important;"><span></span>Rp.<?php echo number_format($harga, 0, ',', ' '); ?></div>
										<div class="product_quantity_container">
                                            <?php echo $jumlah; ?>
											<!-- <div class="product_quantity ml-lg-auto mr-lg-auto text-center">
												<span class="product_text product_num">1</span>
												<div class="qty_sub qty_button trans_200 text-center"><span>-</span></div>
												<div class="qty_add qty_button trans_200 text-center"><span>+</span></div>
											</div> -->
										</div>
										<div class="product_total product_text"><span></span>Rp. <?php echo number_format($subtotal, 0, ',', '.'); ?></div>
                                        <div class="product_quantity_container">
											<div class=" ml-lg-auto mr-lg-auto text-center">
                                                <form id="tambahDetail" name="tambahdetail">
                                                    <input type="hidden" id="id_detail" name="id_detail" value="<?php echo $items['id']; ?>">
                                                <input type="button" value="-" class=" trans_200 text-center"style="width:15px !important" onclick="kurangPesanan('<?php echo $items['id'] ?>')">
                                                <input type="text" class="product_text product_num " style="width:30px !important" nama="jml_<?php echo $items['id'];?>" id="jml_<?php echo $items['id'];?>" value="1">
                                                <input type="button" value="+" class=" trans_200 text-center" style="width:15px !important" onclick="tambahPesanan('<?php echo $items['id'] ?>')">
                                                </form>
											</div>
										</div>
                                    </li>
								</ul>
							</div>
                                <?php $no++; } ?>
                                <div class="product_total product_text" style="width:100% !important;"><span></span>Rp. <?php echo number_format($total, 0, ',', '.');  ?></div>
							<!-- Cart Buttons -->
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="button button_continue trans_200"><a href="<?php echo base_url('Review/reviewProduk'); ?>">Check Out</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	

		<!-- Features -->
		
		<div class="features">
			<div class="container">
				
			</div>
        </div>
        
        <script>
            function tambahPesanan(id_detail){
                var jml = $("#jml_"+id_detail).val();
                // var id_detail = $("#jml").val();
                // $str = $("#tambahDetail").find('input').serialize();

                // alert(id_detail);
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

			function kurangPesanan(id_detail){
                var jml = $("#jml_"+id_detail).val();
                // var id_detail = $("#jml").val();
                // $str = $("#tambahDetail").find('input').serialize();

                // alert(id_detail);
                $.ajax({
                    url: "<?php echo base_url('Makanan/kurangMakanan');?>",
                    type: "POST",
                    data: "jml="+jml+"&id_detail="+id_detail,
                    datatype: "json",
                    success:function(data){
                        // alert("berhasil");
						// console.log(data);
                        location.reload();
                    }
                });
            }
        </script>
<?php $this->load->view ("user/footer")?>