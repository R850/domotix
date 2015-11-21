<?php
	include "lib_zapoz.php";

	//Préparation  du critère de recherche
	// des ID matériels et de la'action correspondante
	// pour le critère jour heure minute donné
	while(true) {
		$jour = date('N');
		$heure = date('G');
		$minute = date('i');
	
        	$dbAgent = new sqlite3( $GLOBALS['dbaseName']);

	        $qry = "Select matosId, action from cadencier where jour='$jour' and heure='$heure' and minute='$minute'";
        	$ret = logMe ("RQT : $qry" );
	        $result = $dbAgent->query($qry);
		
		while ($row = $result->fetchArray()){
			$res = executer($row['matosId'],$row['action']);
			$ret = majStatus($dbAgent, $row['matosId'], $row['action']);
		}
		
		$dbAgent->close();	
		
		sleep(60);
	}

?>
