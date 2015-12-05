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
        $semaine = date('W');
		$jour = date('w');
		$heure = date('G');
        $minute = date('i');
				
		$tabAction = array();

		$db = new sqlite3( $GLOBALS['dbaseName']);
			$qry = "SELECT scenario.materielID as materielID, scenario.action as action FROM 'scenario', 'planning' ";
			$qry .= "WHERE scenario.nom =planning.scenario ";
			$qry .= "AND planning.semaine = $semaine " ;
			$qry .= "AND scenario.jour = $jour ";
			$qry .= "AND scenario.heure = $heure ";
			$qry .= "AND scenario.minute = $minute";	
			
			logMe ("LIB : getActions(\"$qry\")" );
			
			$result = $db->query($qry);
			
			while ($row = $result->fetchArray()){
				$matId = $row['materielID'];
				$action = $row['action']; 
				logMe ("LIB : getActions() :  materiel = $matId  action = $action");
				$ligne = $matId ."&". $action;
				$tabAction[] = $ligne;
			}		

		$db->close();

        $taille = count($tabAction);
        logMe("LIB : getActions() :  Nombre de donnée(s) à traiter : $taille");	
		
		return $tabAction; 
	}

	
	function majStatus($a_matos, $a_action) {
		
		$qry = "Select groupe from materiel where materielID = $a_matos";
		$sqlCmdMatos = "update materiel set etat='$a_action' where materielID=$a_matos";
		$sqlCmdGroupe = "update materiel set etat='$a_action' where groupe=$a_matos";
		
		try {
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
		catch (Exception $e) {
			logme("ERROR : $e");	
			return ;
		}
	}

	
	function executer($b_matos, $b_action) {
		
		try {
			$cmd2exec = $GLOBALS['cmd'] . $GLOBALS['idRFCmd'] . " " . $GLOBALS['codeRF'] . " $b_matos $b_action";
			$output = shell_exec($cmd2exec);
		}
		
		catch (Exception  $e) {
			$msg = $e->getMessage();
			logme("ERROR : $msg");
		}

		$msg = "Excution $b_matos $b_action.";
		logme($msg);
	}

?>
