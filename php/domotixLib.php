<?php
	
	$idRFCmd = "1";
	$codeRF = "12345261";
	$dbaseName = "/var/www/sqliteDb/ti/domoz.db";
	$cmd = "../ressources/radioEmission ";
	$sqlCmd = "";
	$logme="ON";
	$logFile = "domotix.log";	

	function getActions() {
		
		$mois = date('n');
                $jour = date('N');
                $heure = date('G');
                $minute = date('i');
		$tabActions = array();

		$db = new sqlite3( $GLOBALS['dbaseName']);
                $qry = "Select materielID, action from planning where mois=$mois and  jour=$jour and heure=$heure and minute=$minute";
                
		$ret = logMe ("LIB : RQT : $qry" );
                $result = $db->query($qry);
		
                while ($row = $result->fetchArray()){
			logMe ("LIB : materiel = " .$row['materielID']."& action = ".$row['action']);
			$valeurs = $row['materielID'] ."&". $row['action'];
                        logMe ("LIB : \$valeurs vaut : ($valeurs)");
			$tabActions[] = $valeurs;
		}		
		
		$db->close();

                $taille = count($tabActions);
                logMe("LIB : Nombre de donnée(s) à traiter : $taille");	
		
		return $tabActions;
	}

	
	function logMe($msg2log) {
			$fp=fopen($GLOBALS['logFile'],"a+");
			$horodatage = date('D d/n/Y - H:i:s ');
			fwrite($fp,"$horodatage => $msg2log\n");
			fclose($fp);
		return ;
	}
	
	
	function majStatus($a_matos, $a_action) {
		$sqlCmd = "update materiel set etat='$a_action' where materielId=$a_matos;";
		$ret = logMe ("LIB : MAJ ETAT MATERIEL : $sqlCmd" );
		$db = new sqlite3( $GLOBALS['dbaseName']);
		$db->exec($sqlCmd);
		$db->close();
		return;
	}

	function executer($b_matos, $b_action) {
		$cmd2exec = $GLOBALS['cmd'] . $GLOBALS['idRFCmd'] . " " . $GLOBALS['codeRF'] . " $b_matos $b_action";
	 	shell_exec($cmd2exec);
		$ret = logme("LIB : EXEC : $cmd2exec");
		return;
	}

?>
