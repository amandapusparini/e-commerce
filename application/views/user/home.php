<?php $this->load->view ("user/header") ?>
        <!--================Our Latest Product Area =================-->
        <section class="our_latest_product">
            <div class="container">
                <div class="s_m_title">
                    <h2>Makanan Favorit</h2>
                </div>
                <div class="l_product_slider owl-carousel">
		<?php foreach($detail_makanan as $row){ ?>
                    <div class="item">
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <img src="<?php echo base_url('assets/uploads/files');?>/<?php echo $row->gambar; ?>" alt="">
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                    <li><a href="<?php echo base_url('Makanan/inputcart')."/".$row->id_detail; ?>" class="add_cart_btn">Add To Cart</a></li>
                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                </ul>
                                <h4><?php echo $row->nama_detail; ?></h4>
                                <h5>Rp. <?php echo number_format($row->harga, 0, ',', '.'); ?></h5>
                            </div>
                        </div>
                        <!-- <div class="l_product_item">
                            <div class="l_p_img">
                                <img src="<?php echo base_url('assets/user');?>/img/product/l-product-5.jpg" alt="">
                            </div>
                            <div class="l_p_text">
                               <ul>
                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                    <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                </ul>
                                <h4>Oxford Shirt</h4>
                                <h5>$85.50</h5>
                            </div>
                        </div> -->
		    </div>
		    <?php } ?>
                </div>
            </div>
        </section>
	<!--================End Our Latest Product Area =================-->
	
	<!--================Our Latest Product Area =================-->
        <section class="our_latest_product">
            <div class="container">
                <div class="s_m_title">
                    <h2>Minuman Favorit</h2>
                </div>
                <div class="l_product_slider owl-carousel">
		<?php foreach($detail_minuman as $row){ ?>
                    <div class="item">
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <img src="<?php echo base_url('assets/uploads/files');?>/<?php echo $row->gambar; ?>" alt="">
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                    <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                    <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                </ul>
                                <h4><?php echo $row->nama_detail; ?></h4>
                                <h5>Rp. <?php echo number_format($row->harga, 0, ',', '.'); ?></h5>
                            </div>
                        </div>
                        
		    </div>
		    <?php } ?>
                </div>
            </div>
        </section>
	<!--================End Our Latest Product Area =================-->
	
	<section class="our_latest_product">
            <div class="container">
                <div class="s_m_title">
                    <h2>Review</h2>
                </div>
                <div class="l_product_slider owl-carousel">
		<?php foreach($getreview as $row){ ?>
                    <div class="item">
                        <div class="l_product_item">
                            <div class="l-p-img">
			    <img src="<?php echo base_url('assets/uploads/image_user')."/".$row->gambar ?>" class="card-img" alt="<?php echo $row->nama; ?>">
			</div>
                            <div class="l_p_text">
                               
                                <?php echo $row->nama; ?>
                                <h5><?php echo $row->komentar; ?></h5>
                            </div>
                        </div>
                        
		    </div>
		    <?php } ?>
                </div>
            </div>
        </section>
<?php $this->load->view ("user/footer")?>