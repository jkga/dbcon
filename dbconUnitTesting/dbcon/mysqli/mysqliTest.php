<?php

namespace DBConTest\MySQLi;
require_once('vendor/autoload.php');

use \DBCon\MySQLi\mysqli as MySQLi;

##this part was defined on mysqlTest
#define('HOST','localhost');
#define('USERNAME','root');
#define('PASSWORD','');
#define('PORT','');
#define('DBNAME','test');

class mysqliTest extends \PHPUnit_Framework_TestCase
{
    private $db;

    public function __construct(){

    	#setup db connection credential
		$this->db=new mysqli('127.0.0.1','root','','test');

    }

	public function testConnectToMYSQLiUsingNativeConnection(){
		
		

		$sth=$this->db->open();
		#type must be object
		$type=gettype($sth);
		#execute test
   		$foo =$type==='object';
    	$this->assertTrue($foo);

	}



	public function testSelectCountQueryUsingMYSQLi(){
		
		
		$db=$this->db->open();
		$stmt = $db->prepare('select count(*) as total FROM profile where first_name=? ');
			
			
		#stmt
		$name='Juan';
		$stmt->bind_param('i',$name);
		$stmt->execute();
				
			
		$res = $stmt->get_result();

		$result=null;

		#default count
		$total=0;

		#fetch result
		while($row=$res->fetch_object()){
			$total=$row->total;
		}


   		$foo = $total>0;
    	$this->assertTrue($foo);

	}




}

?>