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
		echo "welcome to home page";
	}
	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */