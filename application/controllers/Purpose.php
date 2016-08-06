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
		return TRUE;
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
	*
	*/
	public function details(){

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

			$date = date_create($duedate);
			$new_duedate = date_format($date,"Y-m-d");

			$data = array('name' => $name,
					'description' => $desc,
					'long_lat' => '10.315699:123.885437',
					'type' => $type,
					'delivery_date' => $new_duedate,
					'url_name' =>$this->cleanUrl($name)
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
		$purposeId = trim($this->input->post('id'));
		$id = $this->purpose_model->delete($purposeId);
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
	public function updatePurpose(){
		$id = trim($this->input->post('id'));
		$e = trim($this->input->post('e'));
		if($this->input->server('REQUEST_METHOD') == 'POST' && (isset($e)&& $e!=0))
		{
			$ret['data'] = $this->purpose_model->get($id);
			$data =  json_encode($this->load->view('Purpose/addPurpose',$ret, TRUE));
			$result = '{"d":'.$data.',"m":"","e":"0"}';
			echo $result;
		}
		else
		{
			$name = trim($this->input->post('p_name'));
			$type = trim($this->input->post('p_type'));
			$duedate = trim($this->input->post('p_duedate'));
			$desc = trim($this->input->post('p_desc'));

			$date = date_create($duedate);
			$new_duedate = date_format($date,"Y-m-d");

			$data = array('name' => $name,
					'description' => $desc,
					'long_lat' => '10.315699:123.885437',
					'type' => $type,
					'delivery_date' => $new_duedate,
					'url_name' =>$this->cleanUrl($name)
					);
			$id = $this->purpose_model->update($id,$data);
			if($id){
				$result = '{"d":"1","m":"Success.","e":"0"}';
			}else{
				$result = '{"d":"1","m":"has error.","e":"1"}';
			}
			echo $result;
		}

	}

	public function isEnable(){
		$id = $this->uri->segment(3);
		$stat = $this->uri->segment(4);
		$data = ['isEnable'=>$stat];
		$id = $this->purpose_model->update($id,$data);
		// redirect to table
		redirect(CuConfig::$siteUrl.'purpose', 'refresh'); 
	}
	public function cleanUrl($string){
   		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   		return strTolower(preg_replace('/[^A-Za-z0-9\-]/', '', $string)); // Removes special chars.
	}

	   public function save(){
        $path = $this->do_upload();
        $id = trim($this->input->post('purpose_img_id'));
       // $id = $_POST["purpose_img_id"];
        $this->purpose_model->save($id, $path);
    }

    public function do_upload(){ 
        $type = explode('.', $_FILES["userfile"]["name"]);
        $type = strtolower($type[count($type)-1]);
        $url = "assets/image/purpose_image/".uniqid(rand()).'.'.$type;
        if(in_array($type, array("jpg", "jpeg", "gif", "png")))
            if(is_uploaded_file($_FILES["userfile"]["tmp_name"]))
                if(move_uploaded_file($_FILES["userfile"]["tmp_name"],$url))
                    return $url;
        return "";
    }
	
}
