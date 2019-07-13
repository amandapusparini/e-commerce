<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_makanan extends CI_Model {

    function __construct(){
        parent::__construct();
    }
    

    public function cekData($id){

       $this->db->where('detail_kategori.id_sub_kategori', $id);
       $this->db->join('sub_kategori','sub_kategori.id_sub_kategori=detail_kategori.id_sub_kategori');
       $getrow=$this->db->get('detail_kategori')->result();

    //    $getrow2=$this->db->query('select*from sub_kategori where id_kategori="'.$id.'"')->result();
    //    var_dump($getrow2); exit();
        return  $getrow;
    }
}