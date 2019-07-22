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
			$sqlReview = $this->db->get('review');
			$data['getreview']=$sqlReview->result();

			$row = $sqlReview->row();
			$data['id_review'] = $row->id_review;

		}

		
		$this->load->view('user/home',$data);
	}

	public function homeLogo(){
		redirect(base_url('Index'));	
	}
}