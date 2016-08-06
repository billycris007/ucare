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
		$this->load->view('template/header',$data);
		$this->load->view('template/menu_nav');
		$this->load->view('Purpose/index');
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
		$data = array('name' => 'Typhoon Victim',
				'description' => '',
				'long_lat' => '10.315699:123.885437',
				'type' => 'Typhoon',
				'delivery_date' => ''
				);
		$id = $this->purpose_model->insert($data);
		echo "ID = ".$id;
	}

	/**
	* remove/delete
	*/
	public function removePurpose(){
		$purposeId = 3;
		$id = $this->purpose_model->delete($purposeId);
		echo "test = ".$id;
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
