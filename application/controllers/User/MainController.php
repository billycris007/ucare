<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class MainController extends CI_Controller
{ 
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data['title'] = "U:care";
		$this->load->view('User/Common/header'$data);
		$this->load->view('User/Common/navbar');
		$this->load->view('User/Common/footer');
	}
}