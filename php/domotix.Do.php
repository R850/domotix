<?php
	include "domotix.cfg";
	include "domotix.lib.php";

	$ret = executer($_GET['matos'],$_GET['action']);
	$ret = majStatus($_GET['matos'],$_GET['action']);
	
?>
