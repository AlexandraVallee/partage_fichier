<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">

			<li class="nav-item">
				<a class="nav-link" href="index.php">Accueil</a>
			</li>		
			<li class="nav-item">
				<a class="nav-link" href="index.php?action=fichier_ajout">Ajouter une image</a>	
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?action=profil">Profil</a>	
			</li>
		<li> <a id="connexion_deconnexion" class="btn btn-custom1" href="index.php?action=deconnexion"><span class="icon icon-user"> Deconnexion</a> </li>
		</ul>
		<form class="form-inline my-2 my-lg-0" method="POST" action="index.php?action=search">
                <select class="form-control mr-sm-2"  name="choix"  >
                <option valeur="tag">Par tag</option>
                <option valeur="nom">Par titre</option></select>
                <input class="form-control mr-sm-2"  type="search" name="q" placeholder="Rechercher" aria-label="Rechercher">
                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" name="submitSearch" value="Search" >Rechercher</button>
        </form>
	</div>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
</nav>
