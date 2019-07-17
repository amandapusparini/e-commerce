<?php $this->load->view ("user/header") ?>
<div class="super_container_inner">
<div class="super_overlay"></div>


    <form action="<?php echo base_url('Review/input') ?>" style="margin:100px" method="post" class="form-group">    
		<!--<table>
             <tr>
                <td>Nama</td>
                <td>&nbsp&nbsp:</td>
                <td>&nbsp&nbsp&nbsp<input type="text" name="nama" id="nama" value="" placeholder="Masukkan Nama"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>&nbsp&nbsp:</td>
                <td>&nbsp&nbsp&nbsp<input type="text" name="email_user" id="email_user" value="" placeholder="Masukkan Email"></td>
            </tr> 
            <tr>
                <td>Komentar</td>
                <td>&nbsp&nbsp:</td>
                <td>&nbsp&nbsp&nbsp<textarea name="komentar" id="komentar"></textarea></td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                    <input type="submit" name="btn" id="btn" value="Simpan">
                </td>
            </tr>
        </table>-->
        <div class="form-group">
                <h4>Masukkan Komentar Anda Mengenai Kami</h4>
                <br><br>
                <label for="komentar"><h3>Komentar</h3></label>
                <textarea class="form-control" rows="5" name="komentar" id="komentar" placeholder=""></textarea>
        </div>

        <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
            <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                <div class="button button_clear trans_200" style="margin-right:30px"><a href="<?php echo base_url('Makanan/inputPesanan');?>">Lain Kali</a></div>
                <div class="button button_continue trans_200"><a href="<?php echo base_url('Makanan/inputPesanan'); ?>">Simpan</a></div>
                <input type="submit" value="disini">
            </div>
        </div>
    </form>
	

		<!-- Features -->
		
		<div class="features">
			<div class="container">
				
			</div>
		</div>
<?php $this->load->view ("user/footer")?>