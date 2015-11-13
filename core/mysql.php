<?php 

namespace DBCon\MySQL;

include_once("dbcon.php");

use DBCon;

class database extends Dbcon\dbms{

	const DESCRIPTION=" connect apps to mysql";
	const VERSION="5.3";
	protected $pdo='s';
	protected $db_ini_dbms=null;
	protected $db_ini_host=null;
	private $db_ini_username=null;
	private $db_ini_password=null;
	private $db_ini_dbname=null;
	private $db_ini_port=null;

	function __construct($db_ini_dbms,$db_ini_host,$db_ini_username,$db_ini_password=NULL,$db_ini_dbname='',$db_ini_port=''){
 		
 		#initialize variables
 		$this->db_ini_dbms=$db_ini_dbms;
		$this->db_ini_host=$db_ini_host;
		$this->db_ini_username=$db_ini_username;
		$this->db_ini_password=$db_ini_password;
		$this->db_ini_dbname=$db_ini_dbname;
		$this->db_ini_port=$db_ini_port;

 	}


	function open(){

	 	#connect to mysql dbms
	 	try{
	
	 		$this->pdo=new \PDO($this->db_ini_dbms.':host='.$this->db_ini_host.((!empty($this->db_ini_port)) ? (';port=' . $this->db_ini_port) : '').';dbname='.$this->db_ini_dbname,$this->db_ini_username,$this->db_ini_password);
	 			
	 	}catch(Exception $e){ echo "error has occured.Please try to refresh the page"; }

 		return $this->pdo;


	}

	
	function close(){
		$this->pdo=null;
	}


	function get_description(){

		return $this->description;
	}

	function get_version(){
		return self::VERSION;
	}


}

?>
