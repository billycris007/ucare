<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CU_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	protected function allowAnonymous()
	{
		return false;
	}

	function index()
	{
		$user = SessionUtil::getUser();
		SessionUtil::destroy();
		redirect(CuConfig::$siteUrl, 'refresh');
	}
}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */