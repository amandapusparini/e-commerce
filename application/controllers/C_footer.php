<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_footer extends CI_Controller {

	public function kontak() {
		$this->load->view('user/contactus');
	}
}