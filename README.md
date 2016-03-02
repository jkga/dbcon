# dbcon
A PHP API to connect to different RDBMS and NoSQL
ex. mysql, mysqli, postgresSQL, mongoDB etc..

## Why would you need this
Under the hood, Dbcon uses **PDO** to connect to different supported database management system and **native** functions for those who have not.
You would need these if you need to define multiple database connection on a single file and establish a connection later. It allows the application to connect to different database management system using a **wrapper** that can be used by other developer **easier** and **cleaner**

### Benefits
- cleaner code during development
- configure multiple **different** database connection
- easier to maintain
- modular (can define your own extension.Please see **Extending** section)


### Note
For small projects and simple application, use native functions to connect and manage your databases.It is advisable only to use dbcon for large projects in such maintainability and productivity are tedious tasks. 


## Requirements

* PHP 5.4 (PHP 5.5+ recommended)
* PDO driver
* DBMS **driver** defined by developer's extended class  <br/>


## Currently supported DBMS
* MySQL (PDO) / MySQLi (native)
* PostgreSQL (PDO) <br/>

## How to use
Download the zip file to your computer and  extract to the root directory of your server.
Below is an excerpt script from *example/mysql/mysql.example.php* file to connect to **MySQL**.
Example database connection scripts are located in /example folder for your reference.


```php
<?php 
	#autoload class
	require_once('/path/to/vendor/autoload.php');
	
	#database configuration
	$database=['host'=>'localhost',
				'username'=>'root',
				'password'=>'',
				'port'=>'',
				'dbms'=>'mysql',
				'dbname'=>'your_database'
			];

	#class mysql
	use \DBCon\MySQL\mysql as MySQL;

	#setup database connection
	$db=new MySQL($database['dbms'],$database['host'],$database['username'],$database['password'],$database['dbname']);

	#open connection to mysql
	$sth=$db->open();

	#add query,bind param ,etc. to command. These will depend on your dbms
	$command=$sth->query(...);

	#execute command
	$command->execute();
		
 ?>
```  
<br/>
You may also configure your settings to shift or use different DBMS without affecting the rest of your codes. Doing so will allow applications to sync their data by reading and writing it on different databases.
<br/><br/>
Database Configuration
```php
<?php 
	#config.php
	#configuration settings
	#autoload class
	require_once('/path/to/vendor/autoload.php');
	
	#database configuration
	$database_mysql=['host'=>'localhost',
				'username'=>'root',
				'password'=>'',
				'port'=>'',
				'dbms'=>'mysql',
				'dbname'=>'your_database'
			];

	$database_pgsql=['host'=>'localhost',
			'username'=>'postgres',
			'password'=>'root',
			'port'=>'5432',
			'dbms'=>'pgsql',
			'dbname'=>'test'
		];


	#class mysql ang pgsql
	use \DBCon\MySQL\mysql as MySQL;
	use \DBCon\pgSQL\pgsql as pgSQL;

	/*setup database connection
	 this will remain closed unless explicitly called by '->open()' function */
	 
	$main_database=new MySQL($database_mysql['dbms'],$database_mysql['host'],$database_mysql['username'],$database_mysql['password'],$database_mysql['dbname']);
	$for_statistics_purpose=new pgSQL($database_pgsql['dbms'],$database_pgsql['host'],$database_pgsql['username'],$database_pgsql['password'],$database_pgsql['dbname']);

		
 ?>
```  
<br/>
Page containing CRUD function
```php
<?php 
	#your page.php
	#autoload class
	require_once('/path/to/your/config.php');
	
	#Use this statement to open the connection configured on your configuration
	#open connection to mysql
	//main database
	$sth=$main_database->open();
	#or open connection to pgsql
	//backup database
	$sth=$for_statistics_purpose->open();

	
		
 ?>
```  
<br/>

##Extending
Developer can create their own module by extending defined class to dbms under the namespace DBCon\dbms and to make cleaner extension
add your defined class on dbcon/your_namespace/your_extension_class

Example. dbcon/pgsql/pgsql.php

###### Note: You may use the dbcon_development branch as the core and create a branch with **"dbcon_dev_"** prefix.].

```php
<?php 
#namespace of extension
namespace DBCon\pgSQL;

#include dbcon
include_once(dirname(__DIR__)."../../dbcon.php");

#use dbms namespace
use DBCon\dbms as dbms;

#extend to your defined class
class pgsql extends dbms{

	#these are the functions defined in abstract dbms class
	function __construct(variable here. . .){ code here. . . }

	function open(){ }

	
	function close(){ }


	function get_description(){}

	function get_version(){ }


}

?>

``` 

##Removing unwanted module

Developer A and Developer B conversation

Do you need mysql?		

						I have mysql module
Do you need pgsql?		

						Nope! i dont use it and i need a smaller footprint

Fine i will remove pgsql folder :) 
	 

						wait! i need mongoDB

**SOLUTION: Then Create Module <3**

<br/>

##Test

You can find the PHPUnit tests in dbconUnitTesting folder



## License

This software is under the MIT liscense.Please read LICENSE for information on the software availability and description.

