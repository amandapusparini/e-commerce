<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makanan extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('M_makanan');
	}

	public function index($id_sub_kategori=NULL)
	{
	 //untuk menghapus ssemua makanan di cart
	//$this->cart->destroy();
        $data['rowmakanan']= $this->M_makanan->cekData($id_sub_kategori);
        // var_dump($data); exit();
		$this->load->view('user/v_makanan', $data);
	}

	public function hapusCart(){
		$this->cart->destroy();
	}

	public function inputcart($id_detail){
		$this->db->where('id_detail', $id_detail);
		$getdetail=$this->db->get('detail_kategori')->row();

		//membuat shoping cart
		$data = array(
			'id' => $getdetail->id_detail,
			'qty' => 1,
			'name' => $getdetail->nama_detail,
			'price' => $getdetail->harga,
			'image'=>$getdetail->gambar
		);

		
		$this->cart->insert($data);

		// redirect(base_url())
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		//untuk ngecek script
		// foreach ($this->cart->contents() as $key ) {
		// 	echo $key['qty']."<br>";
		// }
		//  exit;
	}

	public function detailCart(){

		$this->load->view('user/v_detailcart');		
	}

	public function tambahMakanan(){

		$this->db->where('id_detail', $this->input->post('id_detail'));
		$getdetail=$this->db->get('detail_kategori')->row();
		// var_dump($getdetail); exit();		

		//membuat shoping cart
		$data = array(
			'id' => $getdetail->id_detail,
			'qty' =>  $this->input->post('jml'),
			'name' => $getdetail->nama_detail,
			'price' => $getdetail->harga,
			'image'=>$getdetail->gambar
		);

		
		$this->cart->insert($data);
		$total = 0;
		foreach ($this->cart->contents() as $key ) {
				$total = $total + $key['qty'];
			}

		$data = json_decode($this->input->post('jml'));
	}

	public function kurangMakanan(){

		$this->db->where('id_detail', $this->input->post('id_detail'));
		$getdetail=$this->db->get('detail_kategori')->row();
		// var_dump($getdetail); exit();		

		//membuat shoping cart
		$data = array(
			'id' => $getdetail->id_detail,
			'qty' =>  - $this->input->post('jml'),
			'name' => $getdetail->nama_detail,
			'price' => $getdetail->harga,
			'image'=>$getdetail->gambar
		);

		
		$this->cart->insert($data);
		$total = 0;
		foreach ($this->cart->contents() as $key ) {
				$total = $total + $key['qty'];
			}

		$data = json_decode($this->input->post('jml'));
	}

	public function detailProduk(){
		$this->load->view('user/v_produk');
	}
	
		
}