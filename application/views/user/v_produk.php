<?php $this->load->view ("user/header") ?>
<!--================Product Details Area =================-->
<section class="product_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="product_details_slider">
                    <div id="product_slider" class="rev_slider">
                        <img src="<?php echo base_url('assets/uploads/files');?>/<?php echo $getdetail->gambar; ?>" width="100%" height="100%">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="product_details_text">
                    <h3><?php echo $getdetail->nama_detail ?></h3>
                    <h4>Rp. <?php echo number_format($getdetail->harga, 0, ',', '.'); ?></h4>
                    <?php echo $getdetail->deskripsi ?>
                    <div class="quantity">
                        <div class="custom">
                        <!-- <form action="<?php //echo base_url('Makanan/tambahMakanan') ?>" method="post"> -->
                            <button onclick="var result = document.getElementById('jml'); var jml = result.value; if( !isNaN( jml ) &amp;&amp; jml > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                            <input type="text" name="jml" id="jml" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                            <button onclick="var result = document.getElementById('jml'); var jml = result.value; if( !isNaN( jml )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>
                        </div>
                        <a class="add_cart_btn" href="#" onclick="tambahPesanan('<?php echo $getdetail->id_detail ?>')">Tambah</a>
                        <!-- <input type="hidden" name="id_detail" id="id_detail" value="<?php //echo $getdetail->id_detail ?>"> -->
                        <!-- <input type="submit" name="" class="add_cart_btn" value="Tambah"> -->
                        <!-- </form> -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Details Area =================-->
<script>
function tambahPesanan(id_detail){
    var jml = $("#jml").val();
    // var id_detail = $("#jml").val();
    // $str = $("#tambahDetail").find('input').serialize();

     // alert(jml);
     $.ajax({
        url: "<?php echo base_url('Makanan/tambahMakanan');?>",
        type: "POST",
        data: "jml="+jml+"&id_detail="+id_detail,
        datatype: "json",
        success:function(data){
            // alert("berhasil");
            location.reload();
            // console.log(data);
        }
    });
    
}
</script>
<!--================End Related Product Area =================-->
<?php $this->load->view ("user/footer")?>