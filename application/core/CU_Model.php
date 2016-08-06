<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CU_Model extends CI_Model
{
    static $dbConnection;
    
	function __construct()
	{
		parent::__construct();
		self::loadDatabase();
    }
    
    static function loadDatabase() {
        
        $ci = get_instance();
        if (!isset( self::$dbConnection)) {
             self::$dbConnection = $ci->load->database('default', TRUE);
             //log_message('Info', self::$dbConnection->conn_id . ' at ' . time());
        }
    }
}  

/* End of file CU_Model.php */
/* Location: ./system/application/libraries/CU_Model.php */