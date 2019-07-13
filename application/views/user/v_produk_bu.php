<?php $this->load->view ("user/header") ?>
<div class="super_container_inner">
		<div class="super_overlay"></div>


    <!-- Product Info -->
		<div class="col-lg-6 product_col">
			<div class="product_info">
				<div class="product_name"><?php echo $getdetail->nama_detail; ?></div>
					<div class="product_category">Kategori: <?php echo  $getdetail->nama_detail ?></a></div>
						<div class="product_price">Rp. <span><?php echo  $getdetail->harga; ?></span></div>
                            <div class="product_text"><?php echo  $getdetail->deskripsi ?></div>
                            
                            <div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										<div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><img src="<?php echo base_url('assets/user');?>/images/heart_2.svg" class="svg" alt=""><div>+</div></div></div>
										</div>
										<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
											<div><div>
											<a href="<?php echo base_url('Makanan/inputcart')."/".$getdetail->id_detail; ?>">
												<img src="<?php echo base_url('assets/user');?>/images/cart.svg" class="svg" alt="">
											</a>
											<div>+</div></div></div>
										</div>
									</div>
								</div>    
                
			</div>
        </div>
<div>

 <!--<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/flexslider/jquery.flexslider-min.js"></script>
<script src="js/product.js"></script>

<?php $this->load->view ("user/footer")?>