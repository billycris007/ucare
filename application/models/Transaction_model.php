<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction_model extends CU_Model {
    

    public function __construct()
    {
        parent::__construct();
		$this->tb_name = 'transaction';
		$this->db = self::$dbConnection;
    }

	function getLastInserted() {
		return self::$dbConnection->insert_id();
	}

	public function get($id = null){
		if($id){
			$this->db->where('transaction.purpose_id =',$id);
		}else{
			$this->db->where('transaction.purpose_id !=',null);
		}
		$this->db->select('*');
		$this->db->from($this->tb_name);
		$this->db->join('user', 'user.user_id = transaction.user_id'); 
		$this->db->order_by('transaction.created_date', 'DESC');
		$result = $this->db->get();
		return $result->result();
	}

	public function getUrl($purpose_url){ 
        $this->db->select('*');
        $this->db->from($this->tb_name);
        $this->db->join('organization', 'organization.org_id = purpose.org_id'); 
        $this->db->where('url_name',$purpose_url);
        $result = $this->db->get();
        return $result->result();
	}

	public function insert($data){
		self::$dbConnection->insert($this->tb_name,$data);
		return $this->getLastInserted();
	}

	public function delete($id){
		$this->db->where('purpose_id =',$id);
		$this->db->limit(1);
		$this->db->delete($this->tb_name);
		return ($this->db->affected_rows() > 0) ? 1 : 0;
	}

	public function update($id,$data){
		return $this->db->update($this->tb_name,$data,array('purpose_id'=>$id));
	}

    public function save($id, $path){ 
    		$update = array('purpose_image' => $path); 
		return $this->db->update($this->tb_name,$update,array('purpose_id'=>$id));  
        }
}
?>