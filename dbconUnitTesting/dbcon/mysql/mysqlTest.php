<?php

namespace DBConTest\MySQL;
require_once('vendor/autoload.php');

use \DBCon\MySQL\mysql as MySQL;

define('HOST','localhost');

define('USERNAME','root');
define('PASSWORD','');
define('PORT','');
define('DBMS','mysql');
define('DBNAME','test');

class mysqlTest extends \PHPUnit_Framework_TestCase
{
    private $db;

    public function __construct(){

    	#setup db connection credential
		$this->db=new MySQL(DBMS,HOST,USERNAME,PASSWORD,DBNAME);

    }

	public function testConnectToMYSQLUsingPDO(){
		
		
		$sth=$this->db->open();
		#type must be PDO
		$type=gettype($sth);
		#execute test
   		$foo =$type==='object';
    	$this->assertTrue($foo);

	}



	public function testSelectCountQueryInMYSQL(){
		
		#setup sql and open connection to mysql server
		$sql="SELECT count(*) as total FROM profile LIMIT 1";
		$sth=$this->db->open();
	
		$test=$sth->query($sql);

		#execute command
		$test->execute();

		#default count
		$total=0;

		#fetch result
		while($result=$test->fetch(\PDO::FETCH_OBJ)){
			$total=$result->total;	
		}


   		$foo = $total>0;
    	$this->assertTrue($foo);

	}




}

?>