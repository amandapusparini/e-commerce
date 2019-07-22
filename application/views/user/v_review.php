<?php $this->load->view ("user/header") ?>
<style type="text/css">
.simpan
{
    width: 138px;
    height: 44px;
    background: #2fce98;
    border-radius: 2px;
    text-align: center;
    border: solid 2px #2fce98;
    -webkit-transition: all 200ms ease;
    -moz-transition: all 200ms ease;
    -ms-transition: all 200ms ease;
    -o-transition: all 200ms ease;
    transition: all 200ms ease;
}
.simpan a
{
    display: block;
    width: 100%;
    height: 100%;
    font-size: 18px;
    font-weight: 700;
    color: #FFFFFF;
    text-transform: uppercase;
    line-height: 40px;
}
.simpan:hover
{
    background: transparent;
}
.simpan:hover a
{
    color: #2fce98;
}
</style>
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
                <!-- <div > -->
                <input type="submit" name="" value="Simpan" class="simpan">
                <!-- <a href="<?php //echo base_url('Makanan/inputPesanan'); ?>">Simpan</a></div> -->
            </div>
        </div>
    </form>
	

		<!-- Features -->
		
		<div class="features">
			<div class="container">
				
			</div>
		</div>
<?php $this->load->view ("user/footer")?>