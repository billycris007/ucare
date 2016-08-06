<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purpose_model extends CU_Model {
    

    public function __construct()
    {
        parent::__construct();
		$this->tb_name = 'purpose';
		$this->db = self::$dbConnection;
    }

	function getLastInserted() {
		return self::$dbConnection->insert_id();
	}

	public function get($id = null){
		if($id){
			$this->db->where('purpose_id =',$id);
		}else{
			$this->db->where('purpose_id !=',null);
		}
		$this->db->select('*');
		$this->db->from($this->tb_name);// I use aliasing make things joins easier
		$result = $this->db->get();
		return (object)$result->result();
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

}
?>