<?php
	include "domotixLib.php";

	// Recherche des actions à réaliser sur les matériels 
	// indiqués dans la table 'planning' de la base de données
	// pour le critère jour heure minute du moment
	while(true) {
		
		$tabActions =  getActions();
		foreach  ($tabActions as $ligne ){
			logMe("SRV : Materiel : $ligne");		
			list($materiel, $action) = explode("&",$ligne);
			$res = executer($materiel,$action);
			$ret = majStatus($materiel, $action);
		}
		sleep(20);
	}

?>
