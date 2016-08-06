<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CU_Model {
	const TABLE_NAME = "user";
	
	public function __construct()
    {
        parent::__construct();
    }
    
    public function getAll() {
		self::$dbConnection->cache_on();		
		$query = self::$dbConnection->get('users');
        return $query->result();
    }
	
	public function login($user){
		
		$data = (object)array("successful" => false, "errorMsg" => "");
		if($user->email == '' OR $user->password == '') {
        	$data->errorMsg = "All fields are required.";
            return $data;
        }
		
		//Check against user table
        self::$dbConnection->where('email', $user->email); 
        $query = self::$dbConnection->get(self::TABLE_NAME);

		if ($query->num_rows() > 0) {
            $row = $query->row_array(); 
			
            //Check against password
            //if(md5($user->password) != $row['password']) {
            if($user->password != $row['password']) {
				$data->errorMsg = "Invalid Login";
				return $data;
            }
			
			//Remove the password field
            unset($row['password']);
            
            //Login was successful 
            $data->user = (object)$row;
			//var_dump($data->user);
			
            $data->successful = true;          
            return $data;
			
        } else {
            //No database result found
			$data->errorMsg = "Invalid Login";
			return $data;
		}
		
		return $data;
	}
    
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */