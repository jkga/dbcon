<?php 

namespace DBCon;

abstract class dbms{

	abstract protected function get_description();
	abstract protected function get_version();
	abstract protected function open();
	abstract protected function close();

}

?>