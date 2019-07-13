<?php $this->load->view ("user/header") ?>
<div class="super_container_inner">
		<div class="super_overlay"></div>
<!-- Product -->

    <div class="product" style="margin-top:100px;">
        <div class="container">
            <div class="row">
                
                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="product_image_slider_container">
                        <div class="carousel_container">
                            <div id="carousel" class="flexslider">
                                <ul class="slides">
                                    <li>
                                        <div><img src="<?php echo base_url('assets/uploads/files'."/".$getdetail->gambar); ?>" /></div>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-6 product_col">
                    <div class="product_info">
                        <div class="product_name"><h3><?php echo $getdetail->nama_detail; ?></h3></div>
                        <div class="product_category">Kategori: <?php echo  $getdetail->nama_detail ?></div>
                        <div class="product_rating_container d-flex flex-row align-items-center justify-content-start">
                            <!-- <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div> -->
                            <!-- <div class="product_reviews">4.7 out of (3514)</div>
                            <div class="product_reviews_link"><a href="#">Reviews</a></div> -->
                        </div>
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
            </div>
        </div>
    </div>
</div>
<?php $this->load->view ("user/footer")?>