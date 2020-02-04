<?php $this->titre = $image['nom']; ?>	
<div class="container">
	<div class="row justify-content-md-center">
	<h2 class=" col col-lg-2  mb-4 mt-4"><?php echo $image['nom']; ?></h2>
	</div>
	<img class="img-fluid" src=<?php echo ( $image['lien_local']); ?> alt=<?php echo $image['nom']; ?>> </a><br>
	<span ><?php echo ( $image['date_ajout']); ?></span>
</div>
