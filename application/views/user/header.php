<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="<?php echo base_url('assets/user');?>/img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Persuit</title>

        <!-- Icon css link -->
        <link href="<?php echo base_url('assets/user');?>/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/vendors/elegant-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="<?php echo base_url('assets/user');?>/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="<?php echo base_url('assets/user');?>/vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="<?php echo base_url('assets/user');?>/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
        
        <link href="<?php echo base_url('assets/user');?>/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/user');?>/css/responsive.css" rel="stylesheet">

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
                            <a href="<?php echo base_url('Index/homeLogo')?>"><img src="<?php echo base_url('assets/user');?>/img/logo_bf.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="top_right_header">
                            <?php 
                            $jml = 0;
                            $sub_total = 0;
                                foreach ($this->cart->contents() as $key ) {
                                        $jml = $jml + $key['qty'];
                                        $sub_total = $sub_total + ($key['subtotal']*$jml);
                                    }

                            ?>
                            <style>
                                li.cart a:before{
                                    content: '<?php echo $jml; ?>';
                                }
                            </style>
                                <ul class="top_right">
                                    <li class="user"><a href="#"><i class="icon-user icons"></i></a></li>
                                    <li class="cart" style="content:'2' !important;"><a href="<?php echo base_url('Makanan/detailCart') ?>"><i class="icon-handbag icons"></i></a></li>
                                    <li class="h_price">
                                        <select class="selectpicker" disabled>
                                            <option>Rp. <?php echo number_format($sub_total, 0, ',', '.'); ?></option>
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
                    <a class="navbar-brand" href="#"><img src="<?php echo base_url('assets/user');?>/img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav categories">
                            <li class="nav-item">
                                <select class="selectpicker" onchange="getMakanan(this.value)">
				    <option value="">Kategori</option>
					<?php 
						$this->db->order_by('urutan','ASC');
						$menu=$this->db->get('sub_kategori')->result();
						foreach ($menu as $row){ ?>
				    			<option value="<?php echo $row->id_sub_kategori; ?>"><?php echo $row->nama_sub_kategori ?></option>
						<?php } ?>
                                </select>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown submenu active">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Home <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="home-carousel.html">Makanan</a></li>
                                    <li class="nav-item"><a class="nav-link" href="home-fullwidth.html">Minuman</a></li>
                                
                                </ul>
                            </li>
                            <li class="nav-item dropdown submenu">
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
                            </li>
                            <!-- <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Shop <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-2column.html">Prodcut No Sidebar</a></li>
                                    <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-3column.html">Prodcut Two Column</a></li>
                                    <li class="nav-item"><a class="nav-link" href="categories-no-sidebar-4column.html">Product Grid</a></li>
                                    <li class="nav-item"><a class="nav-link" href="categories-left-sidebar.html">Categories Left Sidebar</a></li>
                                    <li class="nav-item"><a class="nav-link" href="categories-right-sidebar.html">Categories Right Sidebar</a></li>
                                    <li class="nav-item"><a class="nav-link" href="categories-grid-left-sidebar.html">Categories Grid Sidebar</a></li>
                                    <li class="nav-item"><a class="nav-link" href="product-details.html">Prodcut Details 01</a></li>
                                    <li class="nav-item"><a class="nav-link" href="product-details2.html">Prodcut Details 02</a></li>
                                    <li class="nav-item"><a class="nav-link" href="product-details3.html">Prodcut Details 03</a></li>
                                    <li class="nav-item"><a class="nav-link" href="shopping-cart.html">Shopping Cart 01</a></li>
                                    <li class="nav-item"><a class="nav-link" href="shopping-cart2.html">Shopping Cart 02</a></li>
                                    <li class="nav-item"><a class="nav-link" href="empty-cart.html">Empty Cart</a></li>
                                </ul>
                            </li>-->
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Index/tataCara')?>">Tata Cara Pemesanan</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Index/login')?>">Login</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--================End Menu Area =================-->
        
