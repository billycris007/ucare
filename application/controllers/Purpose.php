<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purpose extends CU_Controller {

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
		$this->load->model('purpose_model');
	}

	protected function allowAnonymous()
	{
		return false;
	}

	public function index()
	{
		$data['title'] = 'UCare';
		$data['list'] = $this->purpose_model->get();
		$this->load->view('template/header',$data);
		$this->load->view('template/topbar');
		$this->load->view('template/leftnav');
		$this->load->view('Purpose/index',$data);
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
	* add purpose
	*/
	public function addPurpose(){
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$name = trim($this->input->post('p_name'));
			$type = trim($this->input->post('p_type'));
			$duedate = trim($this->input->post('p_duedate'));
			$desc = trim($this->input->post('p_desc'));

			$data = array('name' => $name,
					'description' => $desc,
					'long_lat' => '10.315699:123.885437',
					'type' => $type,
					'delivery_date' => $duedate
					);
			$id = $this->purpose_model->insert($data);
			// redirect to table
			redirect(CuConfig::$siteUrl.'purpose', 'refresh'); 
		}else{
			$data['title'] = 'UCare';
			$this->load->view('template/header',$data);
			$this->load->view('template/topbar');
			$this->load->view('template/leftnav');
			$this->load->view('Purpose/addPurpose');
			$this->load->view('template/footer');
		}
	}

	/**
	* remove/delete
	*/
	public function removePurpose(){
		$purposeId = $this->uri->segment(3);
		$id = $this->purpose_model->delete($purposeId);
		redirect(CuConfig::$siteUrl.'purpose', 'refresh'); 
	}

	/**
	* update
	*/
	public function updatePurpose(){
		$id = 4;
		$data = ['description' => 'Help Build typhoon victims'];
		$id = $this->purpose_model->update($id,$data);
		echo "success ";
	}

	
}
