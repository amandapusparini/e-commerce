<?php $this->load->view ("user/header") ?>

<style type="text/css">
	.border1{
		border: thin solid;
	}
	.row{
		margin-top: 5px;
	}
</style>
<section class="fillter_latest_product">
    <div class="container">
    	<form action="<?php echo base_url('User/updateUser') ?>" method="post"  enctype="multipart/form-data">
	     	<div class="row">
				<div class="col-md-6">
					<h5>Profil</h5>
					<hr>
					<div class="row">
						<div class="col-md-3"><label>Nama</label></div>
						<div class="col-md-8">
							<input type="text" name="nama" id="nama" value="<?php echo $getUser->nama; ?>" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3"><label>No. Telp</label></div>
						<div class="col-md-8">
							<input type="text" name="no_tlp" id="no_tlp" value="<?php echo $getUser->no_tlp; ?>" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3"><label>Email</label></div>
						<div class="col-md-8">
							<input type="text" name="email" id="email" value="<?php echo $getUser->email; ?>" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3"><label>Alamat</label></div>
						<div class="col-md-8">
							<textarea name="alamat" id="alamat" class="form-control">
								<?php echo $getUser->alamat ?>
							</textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3"><label>Username</label></div>
						<div class="col-md-8">
							<input type="text" name="username" id="username" value="<?php echo $getUser->username; ?>" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3"><label>Password</label></div>
						<div class="col-md-8">
							<input type="Password" name="password" id="password" value="" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3"><label>Gambar</label></div>
						<div class="col-md-8">
							<input type="file" name="gambar" id="gambar" value="" class="form-control">
						</div>
					</div>
					<div class="row text-right">
						<div class="col-md-11 text-right">
							<input type="hidden" name="id_user" id="id_user" value="<?php echo $getUser->id_user ?>">
							<input type="submit" name="" value="Ubah" class="btn btn-primary">
						</div>
						
					</div>
				</div>
				<div class="col-md-6" style="border-left: thin dashed;">
					<h5>Riwayat Belanja</h5>
					<hr>
					<table class="table table-bordered">
						<thead>
							<tr>
								<td width="10px">No</td>
								<td>No. Pesanan</td>
								<td>Tanggal Pemesanan</td>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								foreach ($riwayat as $key) {
							?>
							<tr>
								<td><?php echo $no ?></td>
								<td><a href="<?php echo base_url('Pesanan/index')."/".$key->id_pesanan ?>"><?php echo $key->no_pesanan ?></a></td>
								<td><?php echo $key->tgl_pesanan ?></td>
							</tr>
							<?php $no++; } ?>
						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
</section>


<?php $this->load->view ("user/footer") ?>