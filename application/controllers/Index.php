<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {


	function __construct(){
		parent::__construct();
	}

	public function index()
	{

		if($this->input->post('search') !=""){
			$this->db->like('nama_detail',$this->input->post('search'));
			$this->db->join('sub_kategori','detail_kategori.id_sub_kategori=sub_kategori.id_sub_kategori');
			$data['detail_menu'] = $this->db->get('detail_kategori')->result();
			
			// var_dump($this->input->post()); exit;
		}else{
			$this->db->limit('12');
			$this->db->order_by('detail_kategori.poin', 'desc');
			$this->db->join('sub_kategori','detail_kategori.id_sub_kategori=sub_kategori.id_sub_kategori');
			$data['detail_menu']=$this->db->get('detail_kategori')->result();
		}

		
		$this->load->view('user/home',$data);
	}

	public function homeLogo(){
		redirect(base_url('Index'));	
	}
}