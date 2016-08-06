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
		echo "welcome to main page";
	}
	
}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */