<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CU_Controller {

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
		$this->load->model('update_model');
		$this->load->model('transaction_model');
	}

	protected function allowAnonymous()
	{
		return true;
	}

	public function index()
	{
		$data['title'] = 'UCare';
		$this->load->view('User/Common/header',$data);
		$this->load->view('User/Common/navbar');
		$data['allPurpose'] = $this->purpose_model->get(); 
		$data['purpose'] = $this->purpose_model->get(); 
		$this->load->view('User/Main',$data);
		$this->load->view('User/Common/footer');
	}

	public function showAllPosts(){
		$data['title'] = 'All Recent Posts'; 
		$this->load->view('User/Common/header',$data);
		$this->load->view('User/Common/navbar');  
		$data['purpose'] = $this->purpose_model->get(); 
		$this->load->view('User/AllPosts',$data);
		$this->load->view('User/Common/footer');
	} 

	public function showIndiPost(){
		$data['title'] = ucwords(str_replace('-',' ',strtolower($this->uri->segment(2))));
		$this->load->view('User/Common/header',$data);
		$this->load->view('User/Common/navbar'); 

        $purpose_url = $this->uri->segment(2); 
        $data['purpose'] = $this->purpose_model->getUrl($purpose_url);
        $data['trans_datas'] = $this->transaction_model->get();

        $data['update_datas'] = $this->update_model->get();
		$this->load->view('User/individualPost',$data);
		$this->load->view('User/Common/footer');
	}

}
