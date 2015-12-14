<?php 
function my_autoloader($class)
{
	
    $filename =str_replace('\\', '/', strtolower($class)) . '.php';
  	$file=dirname(__DIR__).''.'/'.$filename;
    if(file_exists($file)) include($file);
    #var_dump(dirname(__DIR__).''.$filename);
    
    #var_dump(file_exists($file));
}
spl_autoload_register('my_autoloader');

?>
