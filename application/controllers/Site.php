<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CU_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
	}

	protected function allowAnonymous()
	{
		return true;
	}

	public function index()
	{
		$data['title'] = 'U-Care';
		$this->load->view('User/Common/header',$data);
		$this->load->view('User/Common/navbar');
		$this->load->view('User/Main');
		$this->load->view('User/Common/footer');
	}
}
