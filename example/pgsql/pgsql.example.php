<?php 
require_once('../../vendor/autoload.php');
$database=['host'=>'localhost',
			'username'=>'postgres',
			'password'=>'root',
			'port'=>'5432',
			'dbms'=>'pgsql',
			'dbname'=>'test'
		];
use \DBCon\pgSQL\pgsql as pgSQL;

#setup db connection credential
$db=new pgSQL($database['dbms'],$database['host'],$database['username'],$database['password'],$database['dbname']);

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