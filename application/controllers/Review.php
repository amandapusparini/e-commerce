<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {


	//function __construct(){
       // parent::__construct();
        //$this->load->model('M_makanan');
    //}
    
    public function reviewProduk(){
        $this->load->view('user/v_review');
    }

    public function input(){

        //var_dump($_POST);

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $komentar = $this->input->post('komentar');
        
        $this->db->set('nama', $nama);
        $this->db->set('email', $email);
        $this->db->set('komentar', $komentar);
        $this->db->insert('user');

       redirect(base_url('Index'));
    }

}