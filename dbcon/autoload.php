<?php 
function my_autoloader($class)
{
	
    $filename ='../' . str_replace('\\', '/', strtolower($class)) . '.php';
  
    if(file_exists($filename)) include($filename);
    var_dump( $filename);
}
spl_autoload_register('my_autoloader');

?>
