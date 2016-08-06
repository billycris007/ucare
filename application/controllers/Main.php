<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CU_Controller {

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
		$this->load->view('home',$data);
		$this->load->view('template/footer',$data);
	}
	
}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */