<?php $this->titre = $image['nom']; ?>	
<div class="container">
	
	<div class="row justify-content-md-center">
	<?php if(isset($erreur)){echo $erreur;}?>

	<div class="card mt-4">
		
		<div class="card-body">
			<h2 class="card-title" style="text-align: center;"><?php echo $image['nom']; ?></h2>
				<?php 
                   	if($login===null)
                   		{ ?>
                   		<h3><span class=" icon-thumb_up_alt"> <?= $nbVoteUp; ?> </span><span class="icon-thumb_down_alt"><?= $nbVoteDown; ?></span> </h3> <?php ;};?>
                   <?php if($login!=null)
                   	{ ?>
                   		<h3><span class=" icon-thumb_up_alt" onclick="vote(<?= ( $image['ID']); ?>,'up')"> <?= $nbVoteUp; ?> </span><span class="icon-thumb_down_alt" onclick="vote(<?= ( $image['ID']); ?>,'down')"><?= $nbVoteDown; ?></span> </h3>
                   <?php } ?>
			<img class="img-fluid" height="80px" width="auto" src=<?php echo ( $image['lien_affichage']); ?> alt=<?php echo $image['nom']; ?>><br>
			<div class="card-footer text-muted">
				<span ><?php echo ( $image['date_ajout']); ?></span>
				<p> Lien pour partager l'image : index.php?action=affiche_file&lien=<?php echo $image['lien_url']; ?></p>
				<a href="<?php echo $image['lien_local']; ?>" download="<?php echo $image['nom']; ?>"> Télécharger le fichier </a>
			</div>
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
<script src="Vue/js/vote.js"defer></script>
	
