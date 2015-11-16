<?php 
require_once('../../vendor/autoload.php');
$database=['host'=>'localhost',
			'username'=>'postgres',
			'password'=>'root',
			'port'=>'5432',
			'dbms'=>'pgsql',
			'dbname'=>'test'
		];
use \DBCon\MySQL\mysql as MySQL;

#setup db connection credential
$db=new MySQL($database['dbms'],$database['host'],$database['username'],$database['password'],$database['dbname']);

#setup sql and open connection to mysql server
$sql="SELECT * FROM profile";
$sth=$db->open();
$test=$sth->query($sql);

#execute command
$test->execute();

#fetch result
$res=array();
while($row=$test->fetch(PDO::FETCH_OBJ)){
	$res[]=$row;
}

#display result in 
var_dump($res);
?>