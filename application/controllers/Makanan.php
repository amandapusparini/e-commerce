<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makanan extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('M_makanan');
	}

	public function index($id_sub_kategori=NULL)
	{
		$this->db->where('id_sub_kategori',$id_sub_kategori);
		$getnama = $this->db->get('sub_kategori')->row();
		$data['nama'] = $getnama->nama_sub_kategori;
        $data['rowmakanan']= $this->M_makanan->cekData($id_sub_kategori);
		$this->load->view('user/v_makanan', $data);
	}

	public function hapusCart(){
		$this->cart->destroy();
	}

	public function inputcart($id_detail){
		if(!empty($this->session->userdata('id_user'))){//cek login
			$this->db->limit(1);
			$this->db->order_by('id_toko','desc');
			$getToko = $this->db->get('toko')->row();
	    
			$status_toko = $getToko->status_toko;
			if($status_toko=="tutup"){//status toko tutup
				$data = array(
					'notif'=>true, 
					'pesan'=>"Toko sedang tutup. Silahkan kunjungi.......", 
					'type'=>'warning'
				);
				$this->session->set_flashdata($data);
			}else{//status buka
				$this->db->where('id_detail', $id_detail);
				$getdetail=$this->db->get('detail_kategori')->row();
				$stok = $getdetail->stok;
				$nama_detail = $getdetail->nama_detail;
				if($stok==0){//cek stok
					$data = array(
						'notif'=>true, 
						'pesan'=>"{$nama_detail} sudah habis.", 
						'type'=>'warning'
					);
					
					$this->session->set_flashdata($data);
				}else{
					$stok = $stok - 1;
					$this->db->where('id_detail',$getdetail->id_detail);
					$this->db->set('stok',$stok);
					$this->db->update('detail_kategori');
					//membuat shoping cart
					$data = array(
						'id' => $getdetail->id_detail,
						'qty' => 1,
						'name' => $getdetail->nama_detail,
						'price' => $getdetail->harga,
						'image'=>$getdetail->gambar
					);

					
					$this->cart->insert($data);
				}
			}
		}else{
			$data = array(
				'notif'=>true, 
				'pesan'=>"Silahkan login terlebih dahulu.", 
				'type'=>'warning'
			);
			
			$this->session->set_flashdata($data);
		}
		

		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function detailCart(){

		$this->load->view('user/v_detailcart');		
	}

	public function tambahMakanan(){

		$this->db->where('id_detail', $this->input->post('id_detail'));
		$getdetail=$this->db->get('detail_kategori')->row();
		$stok = $getdetail->stok;
		
		if( $this->input->post('jml')>$stok){
			$data = array(
				'notif'=>true, 
				'pesan'=>"Stok tidak mencukupi.", 
				'type'=>'warning'
			);
			
			$this->session->set_flashdata($data);
		}else{
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
		}

		

		$data = json_decode($this->input->post('jml'));
	}

	public function kurangMakanan(){

		$this->db->where('id_detail', $this->input->post('id_detail'));
		$getdetail=$this->db->get('detail_kategori')->row();
		$stok = $getdetail->stok;
		
		$stok = $stok + $this->input->post('jml');
		$this->db->where('id_detail',$getdetail->id_detail);
		$this->db->set('stok',$stok);
		$this->db->update('detail_kategori');

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
		$data['detail_produk'] = true;
		// var_dump($data); exit();
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
		// var_dump($this->input->post());
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

	public function deleteMakanan(){
		$id_detail = $this->input->post('id_detail');
		
		$data = array(
			'id' => $id_detail,
			'qty' =>  + 3
		);

		
		$this->cart->insert($data);
		$total = 0;
		foreach ($this->cart->contents() as $key ) {
				var_dump($key['qty']); die();
				if($key['qty']<=0){
					$this->cart->remove($key['rowid']);
				}else{
					
					$total = $total + $key['qty'];
				}
			}

		// $data = json_decode("success");

		echo json_encode("das");
	}

	public function stokKosong($id_detail){
		$this->db->where('id_detail',$id_detail);
		$getData = $this->db->get('detail_kategori')->row();

		$nama_detail = $getData->nama_detail;

		$data = array(
			'notif'=>true, 
			'pesan'=>"Pesanan {$nama_detail} sudah habis.", 
			'type'=>'warning'
		);
		
		$this->session->set_flashdata($data);

		header('Location: ' . $_SERVER['HTTP_REFERER']);

		
	}


	
		
}