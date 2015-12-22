<?php
	
	include "domotix.lib.php";
	
	$matos=(isset($_GET['matos'])) ? $_GET['matos'] : NULL;
	$action =(isset($_GET['action'])) ? $_GET['action'] : NULL;
	
	$ret = executer($matos,$action);
	$ret = setStatus($matos,$action);
	
?>
