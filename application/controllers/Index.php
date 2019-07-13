<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {


	function __construct(){
		parent::__construct();
	}

	public function index()
	{

		//$this->db->get('nama_tabel');
		// $this->db->query('select * from detail_kategori')
		$this->db->join('sub_kategori','detail_kategori.id_sub_kategori=sub_kategori.id_sub_kategori');
		$data['detail_menu']=$this->db->get('detail_kategori')->result();
		// var_dump($data); exit();

		
		$this->load->view('user/home',$data);
	}

}