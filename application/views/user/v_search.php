<?php $this->load->view ("user/header_search") ?>
        <!--================Latest Product isotope Area =================-->
        <section class="fillter_latest_product">
            <div class="container">
                <div class="single_c_title">
                    <h2><?php echo $search; ?></h2>
                </div>
                <div class="fillter_l_p_inner">
                    <div class="row isotope_l_p_inner">
                            
		        <?php foreach($detail_menu as $row){ ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="l_product_item">
                                <div class="l_p_img">
                                        <?php if($row->gambar !="") {?>
                                <img src="<?php echo base_url('assets/uploads/files');?>/<?php echo $row->gambar; ?>" alt="<?php echo $row->nama_detail; ?>" height="200px" width="270px">
                                        <?php } else{?>
                                <img src="<?php echo base_url('assets/uploads/files');?>/no_img.jpg" alt="<?php echo $row->nama_detail; ?>" height="200px" width="270px">
                                        <?php } ?>
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
            </div>
        </section>
        <!--================End Latest Product isotope Area =================-->
        
<?php $this->load->view ("user/footer")?>