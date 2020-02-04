<?php $this->titre = "Ajout image"; ?>
<div class="container mt-4">
	<h2 style="text-align: center;" >Ajout du fichier</h2>

	<form action="" method="post">
		<div class="form-group">
			<label nom="nom">Non du fichier</label>
			<input class="form-control" type="text" name="nom">
		</div>
		<div class="form-group">
			<label for="fichier">Ajouter un fichier</label>

			<input class="form-control" type="file" name="fichier" accept="image/png, image/jpeg">
		</div>

			<div class="form-group">
		  		<input type="radio" id="huey" name="drone" value="huey"
		         checked>
		  		<label for="public">Public</label>
			</div>

			<div class="form-group">
		  		<input type="radio" id="dewey" name="drone" value="dewey">
		  		<label for="prive">Privé</label>
			</div>

			<button class="btn btn-primary" name="submit">Envoyer</button> 

		</form>
	</div>