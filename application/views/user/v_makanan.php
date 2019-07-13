<?php $this->load->view ("user/header") ?>
<div class="super_container_inner">
		<div class="super_overlay"></div>

		

		<!-- Products -->
		<div class="row products_row">
				<?php foreach($rowmakanan as $row){ ?>
					<!-- Product -->
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="product_image card-img-top"><img src="<?php echo base_url('assets/uploads/files');?>/<?php echo $row->gambar; ?>" alt="" width="100%" height="100%"></div>
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a href="<?php echo base_url('Makanan/detailProduk'); ?>"><?php echo $row->nama_detail; ?></a></div>
											<div class="product_category">Kategori: <a href="category.html"><?php echo $row->nama_sub_kategori ?></a></div>
										</div>
									</div>
									<div class="ml-auto text-right">
										<!-- <div class="rating_r rating_r_4 home_item_rating"><i></i><i></i><i></i><i></i><i></i></div> -->
										<div class="product_price text-right">Rp. <span><?php echo $row->harga; ?></span></div>
									</div>
								</div>
								
								<div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><img src="<?php echo base_url('assets/user');?>/images/heart_2.svg" class="svg" alt=""><div>+</div></div></div>
										</div>
										<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
											<div><div>
											<a href="<?php echo base_url('Makanan/inputcart')."/".$row->id_detail; ?>">
												<img src="<?php echo base_url('assets/user');?>/images/cart.svg" class="svg" alt="">
											</a>
											<div>+</div></div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
	

		<!-- Features -->
		
		<div class="features">
			<div class="container">
				
			</div>
		</div>
<?php $this->load->view ("user/footer")?>