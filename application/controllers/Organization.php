<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends CU_Controller {

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
		$this->load->model('organization_model');
		$this->load->model('useradmin_model');
	}

	protected function allowAnonymous()
	{
		return false;
	}

	public function index()
	{
		$data['title'] = 'UCare';
		$data['list'] = $this->organization_model->get();
		
		$this->load->view('template/header',$data);
		$this->load->view('template/topbar');
		$this->load->view('template/leftnav');
		$this->load->view('organization/index',$data);
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
	public function details(){

	}

	/**
	* add purpose
	*/
	public function addOrganization(){
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$name = trim($this->input->post('org_name'));
			$desc = trim($this->input->post('org_desc'));
			$user_id = trim($this->input->post('user_id'));

			$data = array('org_name' => $name,
					'org_description' => $desc,
					'user_id' => $user_id
					);
			$id = $this->organization_model->insert($data);
			// redirect to table
			redirect(CuConfig::$siteUrl.'organization', 'refresh'); 
		}else{
			$data['title'] = 'UCare';
			$data['users'] = $this->useradmin_model->get();
			$this->load->view('template/header',$data);
			$this->load->view('template/topbar');
			$this->load->view('template/leftnav');
			$this->load->view('organization/addOrganization');
			$this->load->view('template/footer');
		}
	}

	/**
	* remove/delete
	*/
	public function removeOrganization(){
		$purposeId = trim($this->input->post('id'));
		$id = $this->organization_model->delete($purposeId);
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
	public function updateOrganization(){
		$id = trim($this->input->post('id'));
		$e = trim($this->input->post('e'));
		if($this->input->server('REQUEST_METHOD') == 'POST' && (isset($e)&& $e!=0))
		{
			$ret['data'] = $this->organization_model->get($id);
			$ret['users'] = $this->useradmin_model->get();
			$data =  json_encode($this->load->view('organization/addOrganization',$ret, TRUE));
			$result = '{"d":'.$data.',"m":"","e":"0"}';
			echo $result;
		}
		else
		{
			$name = trim($this->input->post('org_name'));
			$desc = trim($this->input->post('org_desc'));
			$user_id = trim($this->input->post('user_id'));

			$data = array('org_name' => $name,
					'org_description' => $desc,
					'user_id' => $user_id
					);
			$id = $this->organization_model->update($id,$data);
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
