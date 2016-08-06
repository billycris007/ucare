<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CU_Controller extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		//log_message('Info', ' hahaha at ' . time());
		
		// load session library
		$this->load->library('session');
		
		/*
			check if allow anonymous
			- if true do need to proceed to next code
			check if login
			- if true proceed to home
			- if false proceed to login page
		*/
		
		/*
		* check if anonymous access to page is allowed.
		* - if true, no need to proceed to this code
		*/
		if($this->allowAnonymous()){
			//user validation code should not be executed for anonymous users
			return;
		}
		
		
		$sessionUtil = new SessionUtil();
		$sessionUtil->session = $this->session;
		//check if not logged in
		if(!$sessionUtil->isLoggedIn()){
			if ($this->isAjaxRequest())
			{
				$this->output->set_status_header(401);
			}
			else
			{
				//SET the last visited page in session and redirect to login page
			    //SessionUtil::setLastVisitedPage(AppConfig::$url . $this->uri->uri_string());
				SessionUtil::setLastVisitedPage(CuConfig::$siteUrl . $this->uri->uri_string());
				redirect(CuConfig::$siteUrl.'login', 'refresh');
			}
		}
		
		
	}
	
	protected function isAjaxRequest()
	{
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
			&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}
		
	protected function allowAjaxCallOnly()
	{
		if (!$this->isAjaxRequest())
		{
			//return error 404 if not using ajax request
			show_404();
		}
	}
	
	protected function allowAnonymous()
	{
		return false;
	}
}

/* End of file CU_Controller.php */
/* Location: ./systm/application/libraries/CU_Controller.php */