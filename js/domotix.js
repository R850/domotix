//--------------------------------------------------------------------------------	
// Création d'un objet Ajax générique
//--------------------------------------------------------------------------------	
	function getXMLHttpRequest() {
		var xhr = null;
		
		if (window.XMLHttpRequest || window.ActiveXObject) {
			if (window.ActiveXObject) {
				try {
					xhr = new ActiveXObject("Msxml2.XMLHTTP");
				} catch(e) {
					xhr = new ActiveXObject("Microsoft.XMLHTTP");
				}
			} else {
				xhr = new XMLHttpRequest(); 
			}
		} else {
			alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
			return null;
		}
		
		return xhr;
	}	
//--------------------------------------------------------------------------------	
// Traitement des messages à envoyer aux matériels
// Entrée :
// - Identifiant deu matériel
// - Etat souhaité (on / off)
//--------------------------------------------------------------------------------
	function msg($a, $b) {
		// Prépare l'appel au scrit php en lui passant les variables matos et etat.
		$script="./php/domotix.Do.php?";
		$matos="matos=" + $a;
		$action="action=" + $b;
		$cmd = $script + $matos + "&" + $action;

		// Créer un nouvel objet httprequest
		var xhr=null;
		xhr = getXMLHttpRequest();
				
		// On vérifie le code retour du dernier état de la requete http,
		// mais on n'en fait rien de spécial
		// On pourrait très bien traiter le retour du script PHP en cas d'erreur 
		// avec un callback		
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			}
		};
		xhr.open("GET", $cmd ,true);
		xhr.send(null);
	}

//--------------------------------------------------------------------------------	
// Récupération du statut des matériels
// Entrée :
// - le nom  de la fonction  callback de traitement de l'envoie des données 
//   par le script PHP
//--------------------------------------------------------------------------------
	function doRequest(callback,action) {
		
		var progPhp;
		
		switch (action) {
			case 1 : progPhp = "./php/domotix.Get.php";
				break;
			case 2 : progPhp = ".php/domotix.login.php";
				break;
			
		}

		// Création  de l'objet request par l'appel de la fonction générique
		var xhr = getXMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				//alert('Etat : ' + xhr.readyState + '\nStatus : ' + xhr.status + '\n' + xhr.responseText);
				callback(xhr.responseText);
			}
		};
		//xhr.open("GET", "./php/domotix.Get.php", true);
		xhr.open("GET",  progPhp , true);
		xhr.send(null);
	}
	
//--------------------------------------------------------------------------------	
// Traitement de la response renvoyée par la fonction  "doRequest(callBack)"
// Entrée :
// - objet conteneur données
//--------------------------------------------------------------------------------	
	function getStatus(oData){
		var obj = JSON.parse(oData);  
		
		var chaine = '' ;
		var bgColor = '';
		var affichage ='';
		
		for (i=0; i<obj.materiel.length; i++) {
			chaine = obj.materiel[i].nom + " : " + obj.materiel[i].localisation  + "........... " +  obj.materiel[i].etat + '<br>';
		
			if (obj.materiel[i].etat == 'on' ) { 
					bgColor = 'warning';
			}
			else { 
					bgColor = 'default';
			}
		 affichage += '<h4><p><span class=\"label label-' + bgColor + '\">' + chaine + '</span></p></h4><br>';
		}
		document.getElementById("etat").innerHTML = affichage;		
	}


//--------------------------------------------------------------------------------	
// Modele de fonction de callBack passée en paramètre de 
// la fonction generique doRequest
//--------------------------------------------------------------------------------	
	function readModele(oData){
		var obj = JSON.parse(oData); 
		
		var chaine = '' ;
		
		for (i=0; i<obj.materiel.length; i++) {
			chaine += obj.materiel[i].nom +
			" : " + 
			obj.materiel[i].localisation  +
			"........... " +  obj.materiel[i].etat + '\n' + 
			'<br>';
		}
	}	
