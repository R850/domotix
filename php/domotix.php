<?php
	include "domotix.cfg";
	include "domotix.lib.php";

        $getMatosId = $_GET['matos'];
        $getAction  = $_GET['action'];

	$db = new sqlite3( $GLOBALS['dbaseName']);
	
	// ----------------------------------
	// Programme principal 
	// Interpréteur de commande manuelle
        // ----------------------------------
	if ($getMatosId != '99') {
		$ret = executer($getMatosId, $getAction);
		$ret = majStatus($getMatosId, $getAction);
	}
	

	else {
		$listeMatos = array("1","2","4","5");
		foreach ($listeMatos as $matosId ) {
			$ret = executer($matosId, $getAction);
			$ret = majStatus($matosId, $getAction);
		}
	}
	$db->close();


?>
