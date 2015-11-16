<?php 

namespace DBCon\pgSQL;

include_once(dirname(__DIR__)."../../dbcon.php");

use DBCon\dbms as dbms;

class pgsql extends dbms{

	const DESCRIPTION=" connect to postgres database using pdo";
	const VERSION="9.xx";
	protected $connection=null;
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
	
	 		$this->connection=new \PDO($this->db_ini_dbms.':host='.$this->db_ini_host.((!empty($this->db_ini_port)) ? (';port=' . $this->db_ini_port) : '').';dbname='.$this->db_ini_dbname.';user='.$this->db_ini_username.';password='.$this->db_ini_password);
	 				
	 			
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
