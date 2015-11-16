<?php 

namespace DBCon\MySQLi;

include_once(dirname(__DIR__)."../../dbcon.php");

use DBCon\dbms as dbms;

class mysqli extends dbms{

	const DESCRIPTION=" connect apps using mysqli";
	const VERSION="5.xx";
	protected $connection=null;
	protected $db_ini_host=null;
	private $db_ini_username=null;
	private $db_ini_password=null;
	private $db_ini_dbname=null;
	private $db_ini_port=null;

	function __construct($db_ini_host,$db_ini_username,$db_ini_password=NULL,$db_ini_dbname='',$db_ini_port=''){
 		
 		#initialize variables
		$this->db_ini_host=$db_ini_host;
		$this->db_ini_username=$db_ini_username;
		$this->db_ini_password=$db_ini_password;
		$this->db_ini_dbname=$db_ini_dbname;
		$this->db_ini_port=$db_ini_port;

 	}


	function open(){

	 	#connect to mysql dbms
	 	try{

	 		mysqli_report(MYSQLI_REPORT_STRICT);

	 		$this->connection=new \mysqli($this->db_ini_host,$this->db_ini_username,$this->db_ini_password,$this->db_ini_dbname);
	 		#hard check if dbms connects to specific port
	 		if($this->db_ini_port!='') $this->connection=new \mysqli($this->db_ini_host,$this->db_ini_username,$this->db_ini_password,$this->db_ini_dbname,$this->db_ini_port);
	 			
	 	}catch(Exception $e){ echo "error has occured.Please try to refresh the page"; }

 		return $this->connection;


	}

	
	function close(){
		$this->connection=null;
	}


	function get_description(){

		return $this->description;
	}

	function get_version(){
		return self::VERSION;
	}


}



?>
