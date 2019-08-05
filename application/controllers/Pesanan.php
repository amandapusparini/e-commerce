<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
        public function index($id_pesanan = NULL){
                $id_user=$this->session->userdata('id_user');
                $this->db->where('user.id_user', $id_user);
                $this->db->join('pesanan', 'user.id_user=pesanan.id_user');
                $data['getuser'] = $this->db->get('user')->row();

                // $id_pesanan=$this->uri->segment(3);
                $this->db->where('detail_pemesanan.id_pesanan', $id_pesanan);
                $this->db->join('detail_kategori', 'detail_kategori.id_detail=detail_pemesanan.id_detail');
                $data['getpesanan']=$this->db->get('detail_pemesanan')->result();
                $this->load->view('user/v_pesanan', $data);
        }
}