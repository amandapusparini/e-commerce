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

        $id_user = $this->session->userdata('id_user');
        $email = $this->input->post('email_user');
        $komentar = $this->input->post('komentar');
        
        $this->db->set('id_user', $id_user);
        $this->db->set('komentar', $komentar);
        $this->db->insert('review');

       redirect(base_url('Index'));
    }

}