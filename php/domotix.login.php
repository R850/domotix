<?php
	
	include "domotix.cfg";
		
	$login =(isset($_GET['login'])) ? $_GET['login'] : $argv[1];
	$pwd =(isset($_GET['pwd'])) ? $_GET['pwd'] : $argv[2];
	
	$db = new sqlite3( $GLOBALS['dbaseName']);
	$qry = "SELECT count(*) FROM utilisateurs where login = '$login' and pwd = '$pwd'";	
	$rows = $db->query($qry);
	$row = $rows->fetchArray();	
	$numRows = $row[0];
	$db->close();
	
	echo "$numRows";
?>

		
		




