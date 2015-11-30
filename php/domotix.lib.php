<?php

        function logMe($msg2log) {
                $fp=fopen($GLOBALS['logFile'],"a+");
                $horodatage = date('D d/n/Y - H:i:s ');
                fwrite($fp,"$horodatage => $msg2log\n");
                fclose($fp);
                return true;
        }


	function getActions() {
		
		$mois = date('n');
                $jour = date('N');
                $heure = date('G');
                $minute = date('i');
		$tabActions = array();

		$db = new sqlite3( $GLOBALS['dbaseName']);
                $qry = "Select materielID, action from planning where mois=$mois and  jour=$jour and heure=$heure and minute=$minute";
                
		$ret = logMe ("LIB : getActions(\"$qry\")" );
                $result = $db->query($qry);
		
                while ($row = $result->fetchArray()){
			$matId = $row['materielID'];
			$action = $row['action']; 
			$ret = logMe ("LIB : getActions() :  materiel = $matId  action = $action");
			$valeurs = $row['materielID'] ."&". $row['action'];
                        $ret = logMe ("LIB : getActions() : \$valeurs vaut : ($valeurs)");
			$tabActions[] = $valeurs;
		}		
		
		$db->close();

                $taille = count($tabActions);
                logMe("LIB : getActions() :  Nombre de donnée(s) à traiter : $taille");	
		
		return $tabActions;
	}

	
	function majStatus($a_matos, $a_action) {
		$sqlCmd = "update materiel set etat='$a_action' where materielID=$a_matos";
		logMe ("LIB : majStatus(\"$sqlCmd\")");
		$db = new sqlite3( $GLOBALS['dbaseName']);
		$db->exec($sqlCmd);
		$db->close();
	}


	function executer($b_matos, $b_action) {
		$cmd2exec = $GLOBALS['cmd'] . $GLOBALS['idRFCmd'] . " " . $GLOBALS['codeRF'] . " $b_matos $b_action";
	 	$output = shell_exec($cmd2exec);
		logme("LIB : executer(\"$cmd2exec\")");
	}

?>
