<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">

			<li class="nav-item">
				<a class="nav-link" href="index.php">Accueil</a>
			</li>		
			<li class="nav-item">
				<a class="nav-link" href="index.php?action=fichier_ajout">Ajouter une image</a>	
			</li>
			
			<li> <button id="connexion_deconnexion" class="btn btn-custom1" onclick="showFenetreConnexion()"><span class="icon icon-user"> Connexion</button> </li>
		</ul>
		<form class="form-inline my-2 my-lg-0" method="POST" action="index.php?action=search">
                <input class="form-control mr-sm-2"  type="search" name="q" placeholder="Rechercher" aria-label="Rechercher">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="submitSearch" value="Search" >Rechercher</button>
        </form>
	</div>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
</nav>
