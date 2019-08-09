<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="<?php echo base_url('assets/user');?>/img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Banana Outlet Factory</title>

        <!-- Icon css link -->
        <link href="<?php echo base_url('assets/user');?>/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/vendors/elegant-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <!-- <link href="<?php //echo base_url('assets/user');?>/css/bootstrap.min.css" rel="stylesheet"> -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/bootstrap-4.1.2/bootstrap.min.css">
        
        <!-- Rev slider css -->
        <link href="<?php echo base_url('assets/user');?>/vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="<?php echo base_url('assets/user');?>/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
        
        <link href="<?php echo base_url('assets/user');?>/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/css/responsive.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/lib/noty.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/lib/themes/metroui.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fontawesome-free/css/all.min.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
            <!--================Top Header Area =================-->
            <div class="header_top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
			    <div class="top_header_left" style="padding-top:0px;">
			    <form action="<?php echo base_url("Index/index") ?>" id="header_search_form" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" name="search" id="search">
                                    <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="submit"><i class="icon-magnifier"></i></button>
                                    </span>
				</div>
				</form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="top_header_middle">
                            <img src="<?php echo base_url('assets/user');?>/img/logo_bf.png" onclick="home()">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="top_right_header">
                            <?php 
                            $jml = 0;
                            $sub_total = 0;
                                foreach ($this->cart->contents() as $key ) {
                                        $jml = $jml + $key['qty'];
                                        $sub_total = $sub_total + $key['subtotal'] ;
                                    }

                            ?>
                            <style>
                                li.cart a:before{
                                    content: '<?php echo $jml; ?>';
                                }
                            </style>
                                <ul class="top_right">
                                    <li class="user">
                                    <?php if(!empty($this->session->userdata('id_user'))) {?>
                                        <a href="#">
                                            <img src="<?php echo base_url('assets/uploads/image_user')?>/<?php echo $this->session->userdata('gambar') ?>" width="45px" height="50px"><!--i class="icon-user icons"></i-->
                                        </a>
                                    <?php }else{?>
                                        <a href="#">
                                            <i class="icon-user icons"></i>
                                        </a>
                                    <?php } ?>
                                    </li>
                                    <li class="cart" style="content:'2' !important;"><a href="<?php echo base_url('Makanan/detailCart') ?>"><i class="icon-handbag icons"></i></a></li>
                                    <li class="h_price">
                                        <select class="selectpicker" disabled>
                                            <option><?php echo number_format($sub_total, 0, ',', '.'); ?></option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--================End Top Header Area =================-->
        
        <!--================Menu Area =================-->
        <header class="shop_header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/user');?>/img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php 
                        $dataKategori = $this->db->get('kategori')->result();
                        // var_dump($dataKategori); die();
                     ?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav categories">
                            <li class="nav-item">
                                <select class="selectpicker" onchange="getMakanan(this.value)">
				                    <option value="" style="border-bottom: thin solid">Kategori</option>

					               <?php 
                                        foreach ($dataKategori as $key) {
                                    ?>
                                    <option value="<?php echo $key->id_kategori; ?>"><?php echo $key->kategori ?></option>
                                    <?php
                                        }
                                   ?>
                                </select>
                            </li>
                        </ul>
                        <?php 
                            $this->db->order_by('urutan','asc');
                            $dataSubKategori = $this->db->get('sub_kategori')->result();
                            // var_dump($dataKategori); die();
                         ?>
                        <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>">Beranda</a></li>

                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Daftar Menu <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php 
                                        foreach ($dataSubKategori as $key) {
                                    ?>
                                    <li class="nav-item"><a class="nav-link" href="<?php  echo base_url('Makanan/index/')."/".$key->id_sub_kategori ?>"><?php echo $key->nama_sub_kategori ?></a>
                                    <?php } ?>
                                    </li>
                                    <!-- <li class="nav-item"><a class="nav-link" href="home-fullwidth.html">Minuman</a></li> -->
                                
                                </ul>
                            </li>
                            <!-- <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pesanan <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="compare.html">Compare</a></li>
                                    <li class="nav-item"><a class="nav-link" href="checkout.html">Checkout Method</a></li>
                                    <li class="nav-item"><a class="nav-link" href="register.html">Checkout Register</a></li>
                                    <li class="nav-item"><a class="nav-link" href="track.html">Track</a></li>
                                    <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                                    <li class="nav-item"><a class="nav-link" href="404.html">404</a></li>
                                </ul>
                            </li> -->
                            
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Index/tataCara')?>">Tata Cara Pemesanan</a></li>
                            <?php if(!empty($this->session->userdata('id_user'))) {?>
                                <li class="nav-item dropdown submenu">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $this->session->userdata('nama') ?> <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('User/profil')."/".$this->session->userdata('id_user')?>">Profil</a></li>
                                        <!-- <li class="nav-item"><a class="nav-link" href="<?php //echo base_url('User/profil')."/".$this->session->userdata('id_user')?>">Pesanan</a></li> -->
                                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('User/proseslogout') ?>">Logout</a></li>
                                    </ul>
                                </li>
                            <?php }else{?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Index/login')?>">Login</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        
        <!--================End Menu Area =================-->
        
