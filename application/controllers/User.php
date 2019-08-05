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
				$sameName = 0; // Menyimpan banyaknya file dengan nama yang sama dengan file yg diupload
				$handle = opendir($uploadDir);
				while(false !== ($file = readdir($handle))){ 
					if(strpos($file,$extractFile['filename']) !== false)
					$sameName++; // Tambah data file yang sama
				}
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
            $data = array(
                    'id_user'=>$ceklogin->id_user,
                    'gambar' => $ceklogin->gambar,
                    'nama' => $ceklogin->nama
                );
            $this->session->set_userdata($data);

            $data = array(
                'notif'=>true, 
                'pesan'=>"Login berhasil.", 
                'type'=>'success'
            );
            
            $this->session->set_flashdata($data);
            // $this->session->set_userdata('gambar', $ceklogin->gambar);
            redirect(base_url('Index'));
        } else{
            //echo"Gagal Login";
            // $this->session->set_flashdata('notif', 'Gagal');
            $data = array(
                'notif'=>true, 
                'pesan'=>"Silahkan cek username dan password anda.", 
                'type'=>'warning'
            );
            
            $this->session->set_flashdata($data);
            redirect(base_url('Index/login'));
        }

    }

    public function proseslogout(){
        $this->session->sess_destroy();

        $data = array(
                'notif'=>true, 
                'pesan'=>"Terimakasih.", 
                'type'=>'success'
            );
            
            $this->session->set_flashdata($data);
        redirect(base_url('Index'));
    }

    public function profil($id_user){
        // var_dump($id_user); exit();

        $this->db->where('id_user',$id_user);
        $data['getUser'] = $this->db->get('user')->row();

        $this->db->where('id_user',$id_user);
        $data['riwayat'] = $this->db->get('pesanan')->result();

        $this->load->view('user/v_profil',$data);
    }

    public function updateUser(){
        // var_dump($_POST); die();
        $nama = $this->input->post('nama');
        $no_tlp = $this->input->post('no_tlp');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $id_user = $this->input->post('id_user');

        if(empty($_FILES['gambar']['tmp_name'])){
            $this->db->where('id_user',$id_user);                     
            $this->db->set('nama', $nama);
            $this->db->set('email', $email);
            $this->db->set('no_tlp', $no_tlp);
            $this->db->set('alamat', $alamat);
            $this->db->set('username', $username);
            $this->db->set('password', md5($password));
            $this->db->update('user');

            // print_r($param);
            // exit;

            redirect(base_url('User/profil'."/".$id_user));
        }else{
             $uploadDir = "./assets/uploads/image_user/";
                if(is_uploaded_file($_FILES['gambar']['tmp_name'])){

                    $uploadFile = $_FILES['gambar'];
                    // Extract nama file
                    $extractFile = pathinfo($uploadFile['name']);
                    $size = $_FILES['gambar']['size']; //untuk mengetahui ukuran file
                    $tipe = $_FILES['gambar']['type'];// untuk mengetahui tipe file
                        $sameName = 0; // Menyimpan banyaknya file dengan nama yang sama dengan file yg diupload
                        $handle = opendir($uploadDir);
                        while(false !== ($file = readdir($handle))){ 
                            if(strpos($file,$extractFile['filename']) !== false)
                            $sameName++; // Tambah data file yang sama
                        }
                        $newName = empty($sameName) ? $uploadFile['name'] : $extractFile['filename'].'('.$sameName.').'.$extractFile['extension'];

                            if(move_uploaded_file($uploadFile['tmp_name'],$uploadDir.$newName)){
                                
                                $gambar=$newName;   
                                $this->db->where('id_user',$id_user);                     
                                $this->db->set('nama', $nama);
                                $this->db->set('email', $email);
                                $this->db->set('gambar', $gambar);
                                $this->db->set('no_tlp', $no_tlp);
                                $this->db->set('alamat', $alamat);
                                $this->db->set('username', $username);
                                $this->db->set('password', md5($password));
                                $this->db->update('user');

                                $this->session->set_userdata('gambar',$newName);
                                // print_r($param);
                                // exit;

                                redirect(base_url('User/profil'."/".$id_user));
                                
                            }else{
                                echo "gagal";
                            }
                    // }

                }
        }
    }
}