<?php $this->titre = "Ajout image"; ?>
<div class="container mt-4">
	<h2 style="text-align: center;" >Ajout du fichier</h2>

	<?php if(isset($erreur)){echo $erreur;}?>

	<form action="index.php?action=import" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label nom="nom">Non du fichier</label>
			<input class="form-control" type="text" name="nom">
		</div>
		<div class="form-group">
			<label for="fichier">Ajouter un fichier</label>

			<input class="form-control" type="file" name="fileToUpload" id="fileToUpload" accept="image/png, image/jpeg, image/jpg, .doc, .txt, .pdf, .odt">
		</div>

			<div class="form-group">
		  		<input type="radio" id="huey" name="drone" value="public"
		         checked>
		  		<label for="public">Public</label>
			</div>

			<div class="form-group">
		  		<input type="radio" id="dewey" name="drone" value="prive">
		  		<label for="prive">Privé</label>
			</div>

			<button class="btn btn-primary" name="submit">Envoyer</button> 

		</form>
	</div>