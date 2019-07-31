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
			$data['search'] = $this->input->post('search');
			$this->load->view('user/v_search',$data);

		}else{
			$this->db->limit('6'); 
			$this->db->where('sub_kategori.id_kategori', '1');
			$this->db->order_by('detail_kategori.poin', 'desc');
			$this->db->join('sub_kategori','detail_kategori.id_sub_kategori=sub_kategori.id_sub_kategori');
			// $this->db->join('kategori','kategori.id_kategori=sub_kategori.id_kategori');
			$data['detail_makanan']=$this->db->get('detail_kategori')->result();

			$this->db->limit('6'); 
			$this->db->where('sub_kategori.id_kategori', '2');
			$this->db->order_by('detail_kategori.poin', 'desc');
			$this->db->join('sub_kategori','detail_kategori.id_sub_kategori=sub_kategori.id_sub_kategori');
			// $this->db->join('kategori','kategori.id_kategori=sub_kategori.id_kategori');
			$data['detail_minuman']=$this->db->get('detail_kategori')->result();

			$this->db->order_by('id_review','desc');
			$this->db->join('user', 'user.id_user=review.id_user');
			$data['getreview']=$this->db->get('review')->result();

			$this->load->view('user/home',$data);
		}

		
	}
	public function tataCara(){
		$this->load->view('user/v_tatacara');
	}

	public function kategori($id_kategori){
		$this->db->where('kategori.id_kategori',$id_kategori);
		$this->db->join('sub_kategori','sub_kategori.id_kategori=kategori.id_kategori');
		$this->db->join('detail_kategori','sub_kategori.id_sub_kategori=detail_kategori.id_sub_kategori');
		$data['detail_menu'] = $this->db->get('kategori')->result();


		$this->db->where('kategori.id_kategori',$id_kategori);
		$getKategori = $this->db->get('kategori')->row();
		$data['search'] = $getKategori->kategori;
		$this->load->view('user/v_search',$data);
	}

	public function login(){
		$this->load->view('user/v_login');
	}

	public function homeLogo(){
		redirect(base_url('Index'));	
	}
}