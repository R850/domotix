<?php
	$db = new sqlite3("/var/www/sqliteDb/ti/domotix.db3");
	$qry = "Select * from materiel";
	
	$result = $db->query($qry);

	while ($row = $result->fetchArray()){
		$a = $row['localisation'];
		$b = $row['nom'];
		$c = $row['etat'];
		;
	}								
?>