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
		// $this->cart->destroy();
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
		// var_dump("disini"); exit();

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
				// var_dump($key['qty']);
				if($key['qty']<=0){
					$this->cart->remove($key['rowid']);
				}else{
					
					$total = $total + $key['qty'];
				}
			}

		$data = json_decode("success");
	}

	public function detailProduk($id_detail){
		$this->db->where('id_detail', $id_detail);
		$data['getdetail']=$this->db->get('detail_kategori')->row();
		//var_dump($data); exit();
		$this->load->view('user/v_produk',$data);
	}

	public function delete($id){
		$data= array(
			'id'=> $id,
			'qty' => 0
		);
		$this->cart->update($data);
	}

	public function inputPesanan(){
		// exit();
		$id_user = $this->session->userdata('id_user');

		$tgl=date('d');
		$bln=date('m');
		$thn=date('y');

		$no = $this->db->get('pesanan')->num_rows();
		$no_pesanan=$tgl.$bln.$thn.$no;

		$this->db->set('no_pesanan',$no_pesanan);
		$this->db->set('id_user',$id_user);
		$this->db->insert('pesanan');

		$id_pesanan = $this->db->insert_id();//untuk mengambil id terakhir waktu save

		foreach ($this->cart->contents() as $key ) {
			$id_detail= $key['id'];
			$jml_detail=$key['qty'];
			$sub_total=$key['subtotal'];
			
			$this->db->set('id_detail',$id_detail);
			$this->db->set('id_pesanan',$id_pesanan);
			$this->db->set('jml_detail',$jml_detail);
			$this->db->set('sub_total',$sub_total);
			$this->db->set('status', 0);
			$this->db->insert('detail_pemesanan');

			$this->db->set('poin',$jml_detail);
			$this->db->where('id_detail',$id_detail);
			$this->db->update('detail_kategori');
		}

		
		$this->cart->destroy();
		redirect(base_url('Index'));	
	}


	
		
}