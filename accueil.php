<HTML>
  <HEAD>   
    <LINK href="./ressources/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="./ressources/bootstrap-3.3.5-dist/js/jquery-1.11.3.min.js"></script>
	<script src="./ressources/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>  
	    <LINK href="./ressources/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </HEAD>
  <BODY>
	<script language = javascript>
	function msg($a, $b) {
		var xhr=null;
                if (window.XMLHttpRequest) { 
	          xhr = new XMLHttpRequest();
		}
		else if (window.ActiveXObject) {
	       	  xhr = new ActiveXObject("Microsoft.XMLHTTP");
		}
		$script="./php/domotix.Do.php?";
		$matos="matos=" + $a;
		$action="action=" + $b;
		$cmd = $script + $matos + "&" + $action;

		xhr.open("GET", $cmd , false);
		xhr.send(null);
	}

	function dmxGetStatus() {
		var xhr=null;
				if (window.XMLHttpRequest) { 
			  xhr = new XMLHttpRequest();
		}
		else if (window.ActiveXObject) {
			  xhr = new ActiveXObject("Microsoft.XMLHTTP");
		}
		$script="./php/domotix.Get.php?";
		
		xhr.open("GET", $script , false);
		xhr.send(null);		
		/*
		Récupère la réponse , traite les données, met en forme et affiche le résultat
		*/
		
		
		
	}

</script>

<div class="text-center">
<h1>Domoti'X<br></h1>
<p class="lead">Environnement de DEVELOPPEMENT 2.0 (21:43)<br></p>
</div>
        
<div class="container">
  
	<!-- Modale Status -->
	<div class="modal fade" id="ModalStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Etat de matériel :</h4>					
				</div>
				<div class="modal-body">
				Blabla .................
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary"><i class="icon icon-check icon-lg"></i> Valide</button>
					<button type="button" class="btn btn-inverse" data-dismiss="modal"><i class="icon icon-times icon-lg"></i> Fermer</button>
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- Modale A propos -->
	<div class="modal fade" id="ModalAbout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Version 2.0</h4>
				</div>
				<div class="modal-body">
	
							Version en cours de developpement.<BR>
							L'onglet "Groupe" fonctionne aléatoirement bien.<BR>
							<h4>En cas de difficulté veuillez agrésser Trou 2 balles !!!</h4><br>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary"><i class="icon icon-check icon-lg"></i> Valide</button>
					<button type="button" class="btn btn-inverse" data-dismiss="modal"><i class="icon icon-times icon-lg"></i> Fermer</button>
				</div>
			</div>
		</div>
	</div>
	  
	  
	<nav class="navbar navbar-inverse">
		<ul class="nav navbar-nav">
			<li> <a href="#">Accueil</a> </li>
			<li class="dropdown"> 
				<a data-toggle="dropdown" href="#"> Outils<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#ModalAbout"><span class="glyphicon glyphicon-stats"></span> Etat</a></li>
						<li class="divider"></li>
						<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Administrer</a></li> 
					</ul>
			</li>
			<li> 
				<a data-toggle="modal" href="#ModalAbout" ><i class="icon icon-sign-out icon-lg"></i> A propos de</a> 
			</li>
		</ul>
	</nav>




<div class="panel panel-success col-lg-9">
	<h2>Télécommande</h2>
	<div class="panel-heading"> 
		<a href="#item1" data-toggle="collapse"><h4>INTERIEUR</h4></a> 
	</div>
  
	<div id="item1" class="panel-collapse collapse in">
		<div class="panel-body"> 
      
			<div class="row">
				<div class="col-sm-1"> </div>
				<div class="col-sm-5"><p class="lead">Salle à Manger</p> </div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-warning"  value="ON" onclick=msg('1','on')>ON</button>
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-default"  value="OFF" onclick=msg('1','off')>OFF</button>
				</div>
			</div>
	  
			<div class="row">
			  <div class="col-sm-1"> </div>
			  <div class="col-sm-5"><p class="lead">Cuisine</p></div>
			  <div class="col-sm-2">
				<button type="button" class="btn btn-warning"  value="ON" onclick=msg('2','on')>ON</button>
			  </div>
			  <div class="col-sm-2">
				<button type="button" class="btn btn-default"  value="OFF" onclick=msg('2','off')>OFF</button>
			  </div>
			</div>
        
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-5"><p class="lead">Cafetière</p></div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-warning"  value="OFF" onclick=msg('3','on')>ON</button>
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-default"  value="OFF" onclick=msg('3','off')>OFF</button>
				</div>
			</div>
		
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-5"><p class="lead">Salon</p></div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-warning"  value="OFF" onclick=msg('6','on')>ON</button>
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-default"  value="OFF" onclick=msg('6','off')>OFF</button>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-5"><p class="lead">Chambre Emilie</p></div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-warning"  value="OFF" onclick=msg('8','on')>ON</button>
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-default"  value="OFF" onclick=msg('8','off')>OFF</button>
				</div>
			</div>
      </div>
  </div>

  
	<div class="panel-heading"> 
		<a href="#item2" data-toggle="collapse"><h4>EXTERIEUR</h4></a> 
	</div>
  
	<div id="item2" class="panel-collapse collapse">
		<div class="panel-body">      
		
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-5"><p class="lead">Garage</p></div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-warning"  value="OFF" onclick=msg('4','on')>ON</button>
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-default"  value="OFF" onclick=msg('4','off')>OFF</button>
				</div>
			</div>
		
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-5"><p class="lead">Terrasse</p></div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-warning"  value="OFF" onclick=msg('5','on')>ON</button>
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-default"  value="OFF" onclick=msg('5','off')>OFF</button>
				</div>
			</div> 
		
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-5"><p class="lead">Volet roulant</p></div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-warning"  value="OFF" onclick=msg('7','on')>BAS</button>
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-default"  value="OFF" onclick=msg('7','off')>HAUT</button>
				</div>
			</div>
		</div>
     </div>
    
    <div class="panel-heading">
      <a href="#item3" data-toggle="collapse"><h4>GROUPES </h4> </a> 
    </div>
    
    <div id="item3" class="panel-collapse collapse">
		<div class="panel-body">
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-5"><p class="lead" >Interieur<span class="glyphicon glyphicon-log-in"></span> </p></div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-warning"   Value="ON"onclick=msg('14','on')>On</button>
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-default"   value="OFF" onclick=msg('14','off')>OFF</button>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-5"><p class="lead" >Exterieur  <span class="glyphicon glyphicon-log-out"></span> </p></div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-warning"   onclick=msg('15','on')>On</button>
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-default"   onclick=msg('15','off')>OFF</button>
				</div>
			</div>
			
<!--
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-5"><p class="lead">TOUT</p></div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-warning"  onclick=msg('40','on')>ON</button>
				</div>
				<div class="col-sm-2">
					<button type="button" class="btn btn-default"  onclick=msg('40','off')>OFF</button>
				</div>
			</div>
-->

		</div>
  </div>
</div>

</div> 
</body>
</HTML>