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
        $uploadDir = "./assets/uploads/image_user/";
		if(is_uploaded_file($_FILES['gambar']['tmp_name'])){

			$uploadFile = $_FILES['gambar'];
			// Extract nama file
			$extractFile = pathinfo($uploadFile['name']);
			$size = $_FILES['gambar']['size']; //untuk mengetahui ukuran file
			$tipe = $_FILES['gambar']['type'];// untuk mengetahui tipe file
			//Dibawah ini adalah untuk mengatur format gambar yang dapat di uplada ke server.
			//Anda bisa tambahakan jika ingin memasukan format yang lain tergantung kebutuhan anda.
			// $exts =array('image/jpeg','image/jpg','image/png');
			// if(!in_array(($tipe),$exts)){

			// 	$this->session->set_flashdata(array("type" => "error", "msg" =>"Sorry, you must be upload only file  and JPG"));

			// redirect(base_url('employee/masteremployee/addemployee/'.$this->input->post('emp_mst_id').'.html'));

			// }elseif(($size !=0)&&($size>(1000*1024))){

			// 	// dibawah ini script untuk mengatur ukuran file yang dapat di upload ke server
			// 	$this->session->set_flashdata(array("type" => "error", "msg" =>"Sorry, file max. 1 MB"));

			// 	redirect(base_url('employee/masteremployee/addemployee/'.$this->input->post('emp_mst_id').'.html'));
			// }else{

				$sameName = 0; // Menyimpan banyaknya file dengan nama yang sama dengan file yg diupload
				$handle = opendir($uploadDir);
				while(false !== ($file = readdir($handle))){ // Looping isi file pada directory tujuan
					// Apabila ada file dengan awalan yg sama dengan nama file di uplaod
					if(strpos($file,$extractFile['filename']) !== false)
					$sameName++; // Tambah data file yang sama
				}

				/* Apabila tidak ada file yang sama ($sameName masih '0') maka nama file pakai
				* nama ketika diupload, jika $sameName > 0 maka pakai format "namafile($sameName).ext */
				$newName = empty($sameName) ? $uploadFile['name'] : $extractFile['filename'].'('.$sameName.').'.$extractFile['extension'];

					if(move_uploaded_file($uploadFile['tmp_name'],$uploadDir.$newName)){
						
                        $gambar=$newName;
                        $nama = $this->input->post('nama');
                        $no_tlp = $this->input->post('no_tlp');
                        $alamat = $this->input->post('alamat');
                        $email = $this->input->post('email');
                        $username = $this->input->post('username');
                        $password = md5($this->input->post('password'));
                
                        $this->db->set('nama', $nama);
                        $this->db->set('email', $email);
                        $this->db->set('gambar', $gambar);
                        $this->db->set('no_tlp', $no_tlp);
                        $this->db->set('alamat', $alamat);
                        $this->db->set('username', $username);
                        $this->db->set('password', $password);
                        $this->db->insert('user');
						// print_r($param);
						// exit;

                        redirect(base_url('Index'));
						
					}else{
						echo "gagal";
					}
			// }

		}
        //var_dump($_POST);

       

       
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