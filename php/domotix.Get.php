<?php
	$db = new sqlite3("/var/www/sqliteDb/ti/domotix.db3");
	$qry = "Select materielID, nom, localisation, etat from materiel";
	$jsonData = null;
	
	$result = $db->query($qry);

	
	$jsonData = "{ \"materiel\" : [ " ;
	while ($row = $result->fetchArray()) {
		if ($jsonData != "{ \"materiel\" : [ ") {
			$jsonData .=" ,";
		}
 		$jsonData .= utf8_encode("{ \"ID\":\"$row[0]\" ,") ;
		$jsonData .= utf8_encode("\"nom\":\"$row[1]\" ,");
		$jsonData .= utf8_encode("\"localisation\":\"$row[2]\" ,");
		$jsonData .= utf8_encode("\"etat\":\"$row[3]\" } ");
		
	}	
	
	$jsonData .= " ]}";
	utf8_encode($jsonData);
	echo $jsonData; 

?>