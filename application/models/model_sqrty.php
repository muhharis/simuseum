<?php if (! defined('BASEPATH')) exit('No direct script acces allowed');
/*
* File			: Klinik2.php
* Language		: PHP
* Package		: CodeIgniter 3.0
* Location		: application/controllers
*
* SISTEM INFORMASI ADMIINSTRASI KLINIK
*
* Author    	: MuhHaris
* Email     	:muhharis90@yahoo.com
* HP			: 089-537-625-7021
*/
// ------------------------------------------------------------------------
class Model_sqrty extends CI_Model {

	public function getsqrty(){
		$username = $this->session->userdata('username');
		if(empty($username)){
			$this->session->sess_destroy();
			redirect('login');
		}
	}

}
