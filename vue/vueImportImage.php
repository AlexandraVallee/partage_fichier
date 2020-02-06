<?php $this->titre = "Ajout image"; ?>

<div class="container mt-4">
	<h2 style="text-align: center;" >Ajout du fichier</h2>

	<?php if(isset($erreur)){echo $erreur;}?>

	<form id="ajoutFileForm" action="index.php?action=import" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label nom="nom">Nom du fichier</label>
			<input class="form-control" type="text" name="nom">
		</div>
		<div class="form-group">
			<label for="fichier">Ajouter un fichier</label>

			<input class="form-control" type="file" name="fileToUpload" id="fileToUpload" accept="image/png, image/jpeg, image/jpg, .doc, .txt, .pdf, .odt" onchange="charge()">
			<div id="affiche"></div>
		</div>
		<div id="tag" class="form-group">
			<label for="tag">Ajouter un tag</label>

			<input class="form-control" type="text" placeholder="ex : #licorne" name="tag[]" onchange="change()">

			
		</div>
		<?php if($login!=null)
		{ ?>
			<div class="form-group">
		  		<input type="radio" id="huey" name="drone" value="public"
		         checked>
		  		<label for="public">Public</label>
			</div>

			<div class="form-group">
		  		<input type="radio" id="dewey" name="drone" value="prive">
		  		<label for="prive">Privé</label>
			</div>
		<?php }; ?>
			<button class="btn btn-primary" name="submit">Envoyer</button> 

		</form>
	</div>

<script src="Vue/js/formTag.js"defer></script>
	
</script>

	<script type="text/javascript">
	function get_extension(filename) {
    return filename.slice((filename.lastIndexOf('.') - 1 >>> 0) + 2);
}
	function charge(){

		 $('#affiche').children().remove();
		var file=event.target.files[0];
		var extention = '.'+get_extension(file['name']);
		console.log(extention);
		var extentions = ['.jpg', '.png', '.jpeg', '.gif'];
		for(var i=0; i<extentions.length; i++) {
			if(extention === extentions[i]) {
			
			$(document).ready(function(){
			var reader = new FileReader();
            reader.onload = function (e)
		{
            var html = "<img style='width: 200px; height: auto'src=\"" + e.target.result + "\" data-file='"+file.name+"' id='preview' class='preview mt-4'><br>" + "<br/>";
            $('#affiche').append(html);
		}
		reader.readAsDataURL(file);

		})

			}
		}

		
	};

	</script>