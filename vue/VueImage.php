<?php $this->titre = $image['nom']; ?>	
<div class="container">
	
	<div class="row justify-content-md-center">
	<?php if(isset($erreur)){echo $erreur;}?>

	<div class="card mt-4">
		
		<div class="card-body">
			<h2 class="card-title" style="text-align: center;"><?php echo $image['nom']; ?></h2>
			<img class="card-img-bottom" src=<?php echo ( $image['lien_local']); ?> alt=<?php echo $image['nom']; ?>> </a><br>
			<footer class="footer mt-2">
				<span ><?php echo ( $image['date_ajout']); ?></span>
				<p> Lien pour partager l'image : index.php?action=affiche_file&lien=<?php echo $image['lien_url']; ?></p>
			</footer>
		</div>
	</div>
</div>

	<div class="container commentaires">

			<h3 class="mt-4">Les commentaires</h3>

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
	<form id="formCommentaire" action="" >
		<div class="form-group">
		<textarea class="form-control" required placeholder="Votre commentaire ici" name="commentaire" ></textarea>
		<input type="hidden" name="lien" value="<?= $image['lien_url']?>">
		</div>
		<button class="btn btn-secondary mb-4 " type="submit" name="submit">Commenter</button>
	</form>
</div>

<script src="Vue/js/ajoutCommentaire.js"defer></script>
	
