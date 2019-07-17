<?php $this->load->view ("user/header") ?>
<div class="super_container_inner">
<div class="super_overlay"></div>


    <form action="<?php echo base_url('User/prosesregister') ?>" style="margin:80px" method="post" enctype="multipart/form-data" class="form-group">    
		<table>
            <tr>
                <td>Nama</td>
                <td>&nbsp&nbsp:</td>
                <td>&nbsp&nbsp&nbsp<input type="text" name="nama" id="nama" value="" placeholder="Masukkan Nama"></td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>&nbsp&nbsp:</td>
                <td>&nbsp&nbsp&nbsp<input type="text" name="no_tlp" id="no_tlp" value="" placeholder="Masukkan No Telepon"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>&nbsp&nbsp:</td>
                <td>&nbsp&nbsp&nbsp<textarea name="alamat" id="alamat"></textarea></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>&nbsp&nbsp:</td>
                <td>&nbsp&nbsp&nbsp<input type="text" name="username" id="username" value="" placeholder="Masukkan Username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>&nbsp&nbsp:</td>
                <td>&nbsp&nbsp&nbsp<input type="password" name="password" id="password" value="" placeholder="Masukkan Password"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" name="email" id="email" value="" placeholder="Masukkan Email"></td>
            </tr>   
            <tr>
                <td>Gambar</td>
                <td><input type="file" name="gambar" id="gambar" value="" placeholder=""></td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                    <input type="submit" name="btn" id="btn" value="Simpan">
                </td>
            </tr>
        </table>
    </form>
	

		<!-- Features -->
		
		<div class="features">
			<div class="container">
				
			</div>
		</div>
<?php $this->load->view ("user/footer")?>