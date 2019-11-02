<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('URL');
		$this->load->database();
		
	}
	
	public function index()
	{	
		$isi['title'] = "Home";
		$isi['m1'] = "<i class=icon-home></i>Home";
		$isi['m2'] = "...";
		$isi['m3'] = "...";
		$isi['m4'] = "...";
		$isi['fill'] = "das";
		$this->load->view('vhome', $isi);
	}
}
