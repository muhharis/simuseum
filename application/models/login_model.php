<?php
class Login_model extends CI_Model{
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
	//cek code_user dan password user
	function auth_user($username,$password){
		$query=$this->db->query("SELECT * FROM user WHERE code_user='$username' AND pass=MD5('$password') LIMIT 1");
		return $query;
	}

	//cek nim dan password mahasiswa
	

}
