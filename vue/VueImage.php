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
			<div class="figure ">
		   
		      <div> 
		      	<p><?php echo $img['contenu']; ?></p>
		        <p><?php echo $img['date_ajout']; ?></p>
		        <p><?php echo $img['pseudo']; ?></p>
		                    
		    </div>
		</article> 
		         <br>    

	<?php endforeach;}; ?>
	</div>
