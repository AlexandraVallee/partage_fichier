<?php $this->titre = $image['nom']; ?>	
<div class="container">
	<div class="row justify-content-md-center">
	<?php if(isset($erreur)){echo $erreur;}?>
	<h2 class=" col col-lg-2  mb-4 mt-4"><?php echo $image['nom']; ?></h2>
	</div>
	<img class="img-fluid" src=<?php echo ( $image['lien_local']); ?> alt=<?php echo $image['nom']; ?>> </a><br>
	<span ><?php echo ( $image['date_ajout']); ?></span>
	<p> Lien pour partager l'image : index.php?action=affiche_file&lien=<?php echo $image['lien_url']; ?></p>

	<div class="container">
		<?php 
		if(isset($commentaires)){
			foreach ( $commentaires as $img ):
		?>

		<article>
		   
		      <div class="card mt-4">
		      	<div class="card-body"> 
			      	<p><?php echo $img['contenu']; ?></p>
			      	<div class="blockquote-footer">
			        	<p><?php echo $img['pseudo']." le ";echo $img['date_ajout'] ; ?></p>
			        </div>
		        </div>
		      </div>
		</article> 
		         <br>    

		<?php endforeach;}; ?>
	</div>

<div class="container">
	<form action="index.php?action=commenter&id=<?= $image['ID']?>" method="post">
		<div class="form-group">
		<textarea class="form-control" required placeholder="Votre commentaire ici" name="commentaire" ></textarea>
		</div>
		<button class="btn btn-secondary pull-right" type="submit" name="submit">Commenter</button>
	</form>
</div>
	
