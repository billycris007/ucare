<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CU_Controller {

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
		$this->load->model('useradmin_model');
	}

	protected function allowAnonymous()
	{
		return false;
	}

	public function index()
	{
		$data['title'] = 'UCare';
		$data['list'] = $this->useradmin_model->get();
		$this->load->view('template/header',$data);
		$this->load->view('template/topbar');
		$this->load->view('template/leftnav');
		$this->load->view('user_admin/index',$data);
		$this->load->view('template/footer');
	}

	/**
	* get data
	*/
	public function getPurpose(){
		$id = 4;
		$data = $this->purpose_model->get();
		print_r($data);
	}

	/**
	*
	*/
	public function checkEmail(){
		$email = trim($this->input->post('email'));
		if($email){
			$id = $this->useradmin_model->checkEmail($email);
			if(empty($id)){
				$result = '{"d":"1","m":"Sucess.","e":"0"}';
			}else{
				$result = '{"d":"1","m":"Email already taken.","e":"1"}';
			}
		}else{
			$result = '{"d":"1","m":"Email Cannot be empty.","e":"1"}';
		}
		echo $result;
	}

	/**
	* add purpose
	*/
	public function addUser(){
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$firstname = trim($this->input->post('firstname'));
			$lastname = trim($this->input->post('lastname'));
			$email = trim($this->input->post('email'));
			$type = trim($this->input->post('type'));

			$data = array('firstname' => $firstname,
					'lastname' => $lastname,
					'password' => '12345',
					'email' => $email,
					'user_type' => $type,
					);

			$id = $this->useradmin_model->insert($data);
			// redirect to table
			redirect(CuConfig::$siteUrl.'user', 'refresh'); 
		}else{
			$data['title'] = 'UCare';
			$this->load->view('template/header',$data);
			$this->load->view('template/topbar');
			$this->load->view('template/leftnav');
			$this->load->view('user_admin/addUser');
			$this->load->view('template/footer');
		}
	}

	/**
	* remove/delete
	*/
	public function removeUser(){
		$purposeId = trim($this->input->post('id'));
		$id = $this->useradmin_model->delete($purposeId);
		if($id){
			$result = '{"d":"1","m":"Success.","e":"0"}';
		}else{
			$result = '{"d":"1","m":"has error.","e":"1"}';
		}
		echo $result;
	}

	/**
	* update
	*/
	public function updateUser(){
		$id = trim($this->input->post('id'));
		$e = trim($this->input->post('e'));
		if($this->input->server('REQUEST_METHOD') == 'POST' && (isset($e)&& $e!=0))
		{
			$ret['data'] = $this->useradmin_model->get($id);
			$data =  json_encode($this->load->view('user_admin/addUser',$ret, TRUE));
			$result = '{"d":'.$data.',"m":"","e":"0"}';
			echo $result;
		}
		else
		{
			$firstname = trim($this->input->post('firstname'));
			$lastname = trim($this->input->post('lastname'));
			$user_type = trim($this->input->post('user_type'));
			$email = trim($this->input->post('email'));

			$data = array('firstname' => $firstname,
					'lastname' => $lastname,
					'email'=>$email,
					'user_type'=>$user_type
					);
			$id = $this->useradmin_model->update($id,$data);
			if($id){
				$result = '{"d":"1","m":"Success.","e":"0"}';
			}else{
				$result = '{"d":"1","m":"has error.","e":"1"}';
			}
			echo $result;
		}

	}

	public function cleanUrl($string){
   		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   		return strTolower(preg_replace('/[^A-Za-z0-9\-]/', '', $string)); // Removes special chars.
	}

	
}
