<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user');?>/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fontawesome-free/css/all.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/fontawesome-free/css/all.min.css" rel="stylesheet">


<?php $this->load->view ("user/header") ?>
<div class="super_container_inner">
<div class="super_overlay"></div>


    <form action="<?php echo base_url('User/prosesregister') ?>" style="margin:80px" stley="width: 30px" method="post" enctype="multipart/form-data" class="form-group">    
        <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required="">
        </div>

        <div class="form-group">
                <label for="no_tlp">No Telp</label>
                <input type="text" class="form-control" name="no_tlp" id="no_tlp" placeholder="Masukkan No Telepon" required="">
        </div>

        <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" rows="5" name="alamat" id="alamat" placeholder="Masukkan Alamat" required=""></textarea>
        </div>

        <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" required="">
        </div>

        <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required="">
        </div>

        <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Masukkan Email">
        </div>

        <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" name="gambar" id="gambar" placeholder="">
        </div>

        <button class="btn btn-primary" name='btn' id="btn" colspan="3" align="right">Simpan</button>
    </form>
	

		<!-- Features -->
		
		<div class="features">
			<div class="container">
				
			</div>
		</div>
<?php $this->load->view ("user/footer")?>