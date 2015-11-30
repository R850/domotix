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
		$qry = "Select groupe from materiel where materielID = $a_matos";
		$sqlCmdMatos = "update materiel set etat='$a_action' where materielID=$a_matos";
		$sqlCmdGroupe = "update materiel set etat='$a_action' where groupe=$a_matos";
		
		// On cherche le groupe auquel appartient le materiel// Si le matériel n'apartient à acun groupe alors on maj le status du matériel
		// Si le matériel à un id différent du groupe alors on maj le status du matériel
		// Si l'id materiel = l'id groupe alors on maj le status de tous les matériel qui appratiennent à ce groupe
		$db = new sqlite3( $GLOBALS['dbaseName']);
		$result = $db->query($qry);
		$row = $result->fetchArray();
		$group = $row[0];

		if ( $group == $a_matos) {
			$sqlCmd = $sqlCmdGroupe;
		}
		else {
			$sqlCmd = $sqlCmdMatos;
		}
		
		logMe ("LIB : majStatus(\"$sqlCmd\")");

		$db->exec($sqlCmd);
		$db->close();
	}


	function executer($b_matos, $b_action) {
		$cmd2exec = $GLOBALS['cmd'] . $GLOBALS['idRFCmd'] . " " . $GLOBALS['codeRF'] . " $b_matos $b_action";
	 	$output = shell_exec($cmd2exec);
		logme("LIB : executer(\"$cmd2exec\")");
	}

?>
