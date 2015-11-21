<?php
	$idRFCmd = "1";
	$codeRF = "12345261";
	$dbaseName = "/var/www/sqliteDb/ti/domoz.db";
	$cmd = "../ressources/radioEmission ";
	$sqlCmd = "";
	$logme="ON";
	
	
	function logMe($msg2log) {
			$fp=fopen("zapoz.log","a+");
			$horodatage = date('D d/n/Y - H:i:s ');
			fwrite($fp,"$horodatage => $msg2log\n");
			fclose($fp);
		return ;
	}
	
	
	function majStatus($a_db, $a_matos, $a_action) {
		$sqlCmd = "update matos set status = '$a_action' where matosId = '$a_matos';";
		$ret = logMe ("MAJ MATOS : $sqlCmd" );
		$a_db->exec($sqlCmd);
		return;
	}

	function executer($b_matos, $b_action) {
		$cmd2exec = $GLOBALS['cmd'] . $GLOBALS['idRFCmd'] . " " . $GLOBALS['codeRF'] . " $b_matos $b_action";
	 	shell_exec($cmd2exec);
		$ret = logme("EXEC : $cmd2exec");
		return;
	}

?>
