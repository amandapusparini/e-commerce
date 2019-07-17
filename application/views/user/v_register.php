<?php $this->load->view ("user/header") ?>
<div class="super_container_inner">
<div class="super_overlay"></div>


    <form action="<?php echo base_url('User/prosesregister') ?>" style="margin:80px" stley="width: 30px" method="post" enctype="multipart/form-data" class="form-group">    
        <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
        </div>

        <div class="form-group">
                <label for="no_tlp">No Telp</label>
                <input type="text" class="form-control" name="no_tlp" id="no_tlp" placeholder="Masukkan No Telepon">
        </div>

        <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" rows="5" name="alamat" id="alamat" placeholder="Masukkan Alamat"></textarea>
        </div>

        <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username">
        </div>

        <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" id="password" placeholder="Masukkan Password">
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