<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('Super.php');

class Pesanan extends Super //class mengikuti nama file. diawali dengan huruf besar
{
    
    function __construct()
    {
        parent::__construct();
        $this->language       = 'english'; /** Indonesian / english **/
        $this->tema           = "flexigrid"; /** datatables / flexigrid **/
        $this->tabel          = "pesanan"; //nama tabel sesuai dengan nama yg ada di database
        $this->active_id_menu = "pesanan";
        $this->nama_view      = "Pesanan"; //tampilan untuk di view
        $this->status         = true; 
        $this->field_tambah   = array(); 
        $this->field_edit     = array(); 
        $this->field_tampil   = array(); 
        $this->folder_upload  = 'assets/uploads/files';
        $this->add            = true;
        $this->edit           = true;
        $this->delete         = true;
        $this->crud;
    }

    function index(){
            $data = [];
            if($this->crud->getState()=="read")
                redirect(base_url("admin/Pesanan/view_detail/".$this->uri->segment(5)));
            /** Bagian GROCERY CRUD USER**/


            /** Relasi Antar Tabel 
            * @parameter (nama_field_ditabel_ini, tabel_relasi, field_dari_tabel_relasinya)
            **/
            $this->crud->set_relation('id_user','user','nama');

            /** Upload **/
            // $this->crud->set_field_upload('nama_field_upload',$this->folder_upload);  
            
            /** Ubah Nama yang akan ditampilkan**/
            // $this->crud->display_as('nama','Nama Setelah di Edit')
            $this->crud->display_as('id_user','User'); 
            
            /** Akhir Bagian GROCERY CRUD Edit Oleh User**/
            $data = array_merge($data,$this->generateBreadcumbs());
            $data = array_merge($data,$this->generateData());
            $this->generate();
            $data['output'] = $this->crud->render();
            $this->load->view('admin/'.$this->session->userdata('theme').'/v_index',$data);
    }

    private function generateBreadcumbs(){
        $data['breadcumbs'] = array(
                array(
                    'nama'=>'Dashboard',
                    'icon'=>'fa fa-dashboard',
                    'url'=>'admin/dashboard'
                ),
                array(
                    'nama'=>'Admin',
                    'icon'=>'fa fa-users',
                    'url'=>'admin/useradmin'
                ),
            );
        return $data;
    }

    public function view_detail($id_pesanan){
        $this->db->where('pesanan.id_pesanan', $id_pesanan);
        $this->db->join('pesanan', 'user.id_user=pesanan.id_user');
        $data['getuser'] = $this->db->get('user')->row();
;
        $this->db->where('detail_pemesanan.id_pesanan', $id_pesanan);
        $this->db->join('detail_kategori', 'detail_kategori.id_detail=detail_pemesanan.id_detail');
        $data['getpesanan']=$this->db->get('detail_pemesanan')->result();

        $data = array_merge($data,$this->generateBreadcumbs());
        $data = array_merge($data,$this->generateData());
        $this->generate();
        $data['page'] = "v_detail_pesanan";
        $data['output'] = $this->crud->render();
        $this->load->view('admin/'.$this->session->userdata('theme').'/v_index',$data);
    }
}