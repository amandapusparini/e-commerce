<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('M_makanan');
    }
    
    public function register(){
        $this->load->view('user/v_register');
    }

    public function prosesregister(){

        //var_dump($_POST);

        $nama = $this->input->post('nama');
        $no_tlp = $this->input->post('no_tlp');
        $alamat = $this->input->post('alamat');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $this->db->set('nama', $nama);
        $this->db->set('no_tlp', $no_tlp);
        $this->db->set('alamat', $alamat);
        $this->db->set('username', $username);
        $this->db->set('password', $password);
        $this->db->insert('user');

       redirect(base_url('Index'));
    }

    public function proseslogin(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $ceklogin= $this->db->get('user')->row();
        
        if($ceklogin){
            //echo "Berhasi Login";
            $this->session->set_userdata('id_user', $ceklogin->id_user);
            redirect(base_url('Index'));
        } else{
            //echo"Gagal Login";
            $this->session->set_flashdata('notif', 'Gagal');
            redirect(base_url('Index'));
        }

    }

    public function proseslogout(){
        $this->session->sess_destroy();
        redirect(base_url('Index'));
    }
}