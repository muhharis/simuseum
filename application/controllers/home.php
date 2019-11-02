<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}
	
	function index()
	{	
		$isi['title'] = "Home";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "...";
		$isi['m3'] = "...";
		$isi['m4'] = "...";
		$isi['fill'] = "home/vhome";
		$this->load->view('vhome', $isi);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}
