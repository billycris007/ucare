<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CU_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	protected function allowAnonymous()
	{
		return false;
	}
	
	public function index()
	{
		$data['error'] = $this->input->get('error');
		$data['title'] = "UCare - Home";
		$this->load->view('template/header',$data);
		$this->load->view('template/topbar',$data);
		$this->load->view('template/leftnav',$data);
		$this->load->view('home',$data);
		$this->load->view('template/footer',$data);
	}
	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */