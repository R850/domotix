<?php
	include "lib_zapoz.php";

        $getMatosId = $_GET['matos'];
        $getAction  = $_GET['action'];

	$db = new sqlite3( $GLOBALS['dbaseName']);
	
	// ----------------------------------
	// Programme principal 
	// Interpréteur de commande manuelle
        // ----------------------------------
	if ($getMatosId != '99') {
		$ret = executer($getMatosId, $getAction);
		$ret = majStatus($GLOBALS['db'], $getMatosId, $getAction);
	}
	

	else {
		$listeMatos = array("1","2","4","5");
		foreach ($listeMatos as $matosId ) {
			$ret = executer($matosId, $getAction);
			$ret = majStatus($GLOBALS['db'], $matosId, $getAction);
		}
	}
	$db->close();


?>
