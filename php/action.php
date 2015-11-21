<?php
<<<<<<< HEAD
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
	
=======
	$idRFCmd = "1";
	$codeRF = "12345261";
        $getMatosId = $_GET['matos'];
	$getAction = $_GET['action']; 
	$dbaseName = "/var/www/sqliteDb/ti/domoz.db";
	$cmd = "../ressources/radioEmission ";
	$listeMatos = array("1","2","4","5");	
	$qry = "";
	$logme="ON";
	
	
	function logMe($msg2log) {
			$fp=fopen("zapoz.log","a+");
			$horodatage = date('D d/n/Y - H:i:s ');
			fwrite($fp,"$horodatage => $msg2log\n");
			fclose($fp);
		return ;
	}
	
	
	function majStatus($a_matos, $a_action) {
		$db = new sqlite3( $GLOBALS['dbaseName']);
		$qry = "update matos set status = '$a_action' where matosId = '$a_matos';";
		$ret = logMe ("Maj Base : $qry" );
		$db->exec($qry);
		$db->close();
		return;
	}

	function executer($b_matos, $b_action) {
		$cmd2exec = $GLOBALS['cmd'] . $GLOBALS['idRFCmd'] . " " . $GLOBALS['codeRF'] . " $b_matos $b_action";
	 	shell_exec($cmd2exec);
		$ret = logme("Execution : $cmd2exec");
		$ret = majStatus($b_matos,$b_action);
		return;
	}

	
	// --------------------
	// Programme principal
        // --------------------
	if ($getMatosId != '99') {
		//$cmd="../ressources/radioEmission  $idRFCmd $codeRF $matos $action";
		$ret = executer($getMatosId, $getAction);
	}

>>>>>>> 2f1e3aa26b130e0d4746eaf66148ee2d32c4a439
	else {
		$listeMatos = array("1","2","4","5");
		foreach ($listeMatos as $matosId ) {
			$ret = executer($matosId, $getAction);
<<<<<<< HEAD
			$ret = majStatus($GLOBALS['db'], $matosId, $getAction);
		}
	}
	$db->close();
=======
		}

	}

>>>>>>> 2f1e3aa26b130e0d4746eaf66148ee2d32c4a439
?>
