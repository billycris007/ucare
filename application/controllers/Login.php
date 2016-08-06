<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CU_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	protected function allowAnonymous()
	{
		return true;
	}
	
	public function index()
	{
		//echo "login page";
		$data['error'] = $this->input->get('error');
		$data['title'] = "UCare - Home";
		$this->load->view('template/header',$data);
		$this->load->view('login/login',$data);
		$this->load->view('template/footer',$data);
	}
	
	public function validate()
	{
		$input = new stdClass();
		$input->email = trim($this->input->post('email'));
		$input->password = $this->input->post('password');
		//var_dump($input);
		//echo "<br/>";
		
		//check login details in DB and return successful flag, error message if any and user details if successful
		$userLogin = $this->user_model->login($input);
		echo "<br/>";
		echo $userLogin->successful."<br/>";
		
		if($userLogin->successful){
			//set session
			$user = $userLogin->user;
			SessionUtil::setAuthenticatedUser($user);
			$link = SessionUtil::getLastVisitedPage();
			if (!isset($link)) 
			{
				$link = CuConfig::$siteUrl . "user/";
			}
			redirect($link, 'refresh');
		}else{
			redirect(CuConfig::$siteUrl.'login?error=Login Failed', 'refresh');
		}
		//redirect(CuConfig::$siteUrl.'login?error=Login Failed', 'refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */