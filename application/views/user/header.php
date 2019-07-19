<!DOCTYPE html>
<html lang="en">
<head>
<title>Banana Factory Outlet</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="<?php echo base_url('assets/user');?>/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/styles/responsive.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fontawesome-free/css/all.min.css">

</head>
<body>

<!-- Menu -->

<div class="menu">

	<!-- Search -->
	<div class="menu_search">
		<form action="<?php echo base_url('Index/index') ?>" method="post" id="menu_search_form" class="menu_search_form">
			<input type="text" class="search_input" placeholder="Cari Makan" required="required">
			<!-- <button class="menu_search_button"><img src="images/search.png" alt=""></button> -->
		</form>
	</div>
	<!-- Navigation -->
	<div class="accordion" id="accordionExample">
		<?php 
			$menu=$this->db->get('kategori')->result();
			foreach ($menu as $row){ ?>
		<div class="card">
			<div class="card-header" id="headingOne">
			<h2 class="mb-0">
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?php echo $row->kategori ?>" aria-expanded="true" aria-controls="collapseOne">
				<?php echo $row->kategori; ?>
				</button>
			</h2>
			</div>

			<div id="<?php echo $row->kategori ?>" class="collapse" aria-labelledby="<?php echo $row->id_kategori ?>" data-parent="#accordionExample">
				<div class="card-body">
					<?php $id_kategori = $row->id_kategori; 
						$this->db->where('id_kategori',$id_kategori);
						$getSubKategori = $this->db->get('sub_kategori')->result();
						echo "<ul>";
						foreach($getSubKategori as $subKategori){
							echo "<li><a href='".base_url('Makanan/index/'.$subKategori->id_sub_kategori)."'>".$subKategori->nama_sub_kategori."</a></li>";
						}
						echo "</ul>";
					?>
				</div>
			</div>
		</div>
		
		<?php } ?>
		
			<div class="card">
				<div class="card-header" id="headingOne">
					<h2 class="mb-0">
						<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#pesanan" aria-expanded="true" aria-controls="collapseOne">
							Pesanan
						</button>
					</h2>
				</div>

				<div id="pesanan" class="collapse" aria-labelledby="pesanan" data-parent="#accordionExample">
					<div class="card-body">
						<?php
						$this->db->order_by('no_pesanan','DESC');
							$this->db->where('id_user',$this->session->userdata('id_user'));
							$getPesanan = $this->db->get('pesanan')->result();
							// var_dump($getPesanan);
							echo "<ul>";
							foreach($getPesanan as $subPesanan){
								echo "<li><a href='".base_url('Pesanan/index/'.$subPesanan->id_pesanan)."'>".$subPesanan->no_pesanan." | ".$subPesanan->tgl_pesanan."</a></li>";
							}
							echo "</ul>";
						?>
					</div>
				</div>
			</div>
		
	
		<br>	
			
<!-- form login -->
		<div class="login1">

		<?php if($this->session->userdata('id_user') != 0){
			$id_user= $this->session->userdata('id_user');

			$this->db->where('id_user', $id_user);
			$user=$this->db->get('user')->row();
		?>

		<table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $user->nama; ?></td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>:</td>
                <td><?php echo $user->no_tlp; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $user->alamat; ?></td>
			</tr>
			<tr>
				<td colspan="3"><a href="<?php echo base_url('User/proseslogout') ?>" class="btn btn-danger">Keluar</a></td>
			</tr>
		</table>

		<?php
		}else{
		?>
			<form action="<?php echo base_url('User/proseslogin') ?>" method="post">
				<h4 class="text-center">Form Login</h4>
				<div class="form-group">
					<label>Username</label>

					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<i class="fas fa-user"></i>
							</div>
						</div>
						<input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username Anda">
					</div>
				</div>

				<div class="form-group">
						<label>Password</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="fas fa-unlock-alt"></i>
								</div>
							</div>
							<input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password Anda">
						</div>
					</div>
				<input type="submit" name="submit" id="submit" value="Login" class="btn btn-primary"> 
				<a href="<?php echo base_url('User/register')?>"class="btn btn-link">Daftar</a>
			</form>
		<?php } ?>
		</div>
	</div> 


	<!-- Contact Info -->

</div>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_overlay"></div>
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo">
				<a href="<?php echo base_url('Index');?>">
					<div class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="<?php echo base_url('assets/user');?>/images/logo_bfo.png" alt=""></div>
						<div>Banana Factory Outlet </div>
					</div>
				</a>	
			</div>
			<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
			<!-- <nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li class="active"><a href="#">Women1</a></li>
					<li><a href="#">Men</a></li>
					<li><a href="#">Kids</a></li>
					<li><a href="#">Home Deco</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
			</nav> -->
			<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
				<!-- Search -->
				<div class="header_search">
					<form action="<?php echo base_url("Index/index") ?>" id="header_search_form" method="post">
						<input type="text" class="search_input" placeholder="Cari Makanan" required="required" name="search" ida="search">
						<button class="header_search_button"><img src="<?php echo base_url('assets/user');?>/images/search.png" alt=""></button>
					</form>
				</div>

				<?php 
				$jml = 0;
					foreach ($this->cart->contents() as $key ) {
							$jml = $jml + $key['qty'];
						}

				?>
				<div class="user"><a href="<?php echo base_url('Makanan/detailCart') ?>"><div><img src="<?php echo base_url('assets/user');?>/images/cart.svg"><div><?php echo $jml ?></div></div></a></div>

				<!-- Cart -->
				<!-- <div class="cart">
					<a href="cart.html">
					<div>
						<img class="svg" src="<?php //echo base_url('assets/user');?>/images/cart.svg" alt="https://www.flaticon.com/authors/freepik">
						<div>1</div></div>
					<div>1</div>
					</a>
				</div> -->
				<!-- Phone -->
			</div>
		</div>
	</header>