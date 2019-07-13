<?php $this->load->view ("user/header") ?>
<div class="super_container_inner">
<div class="super_overlay"></div>


    <form action="<?php echo base_url('Review/input') ?>" style="margin:100px" method="post">    
		<table>
            <!-- <tr>
                <td>Nama</td>
                <td>&nbsp&nbsp:</td>
                <td>&nbsp&nbsp&nbsp<input type="text" name="nama" id="nama" value="" placeholder="Masukkan Nama"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>&nbsp&nbsp:</td>
                <td>&nbsp&nbsp&nbsp<input type="text" name="email_user" id="email_user" value="" placeholder="Masukkan Email"></td>
            </tr> -->
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
        </table>
    </form>
	

		<!-- Features -->
		
		<div class="features">
			<div class="container">
				
			</div>
		</div>
<?php $this->load->view ("user/footer")?>