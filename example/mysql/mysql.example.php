<?php 
require_once('../../vendor/autoload.php');
$database=['host'=>'localhost',
			'username'=>'root',
			'password'=>'',
			'port'=>'',
			'dbms'=>'mysql',
			'dbname'=>'test'
		];
use \DBCon\MySQL\mysql as MySQL;

#setup db connection credential
$db=new MySQL($database['dbms'],$database['host'],$database['username'],$database['password'],$database['dbname']);

#setup sql and open connection to mysql server
$sql="SELECT * FROM profile";
$sth=$db->open();
$a=$sth->query($sql);

#execute command
$a->execute();

#fetch result
$res=array();
while($row=$a->fetch(PDO::FETCH_OBJ)){
	$res[]=$row;
}

#display result in 
var_dump($res);
?>