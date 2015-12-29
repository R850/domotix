<?php
	
	include "domotix.cfg";
	
	$login =(isset($_POST['login'])) ? $_POST['login'] : $argv[1];
	$pwd =(isset($_POST['pwd'])) ? $_POST['pwd'] : $argv[2];
	
	$db = new sqlite3( $GLOBALS['dbaseName']);
	$qry = "SELECT count(*) FROM utilisateurs WHERE login='$login' and pwd='$pwd'";	
	
	$rows = $db->query($qry);
	$row = $rows->fetchArray();	
	$numRows = $row[0];
	$db->close();
	
	if ($numRows == 1)  {
				//header("Location:../index.html"); 
		$html = implode('', file('../index.html'));
		echo $html;
	}

?>


