<?php $this->titre = "Profil de ".$this->login; ?>

<?php if(isset($erreur)){echo $erreur;} ?>
<div class="gallery" id="gallery">

<?php
if(isset($listeFile)){
foreach($listeFile as $file):

    ?>
<figure class="figure">
   <div class="mb-3 pics animation all 2">

   			<div class="card mt-2 mr-2 ml-4">
		
		<div class="card-body">

                    <h2 class="card-title" style="text-align: center;" ><?php echo $file['nom']; ?></h2>
                    <a href="index.php?action=affiche_file&lien=<?php echo ( $file['lien_url']); ?>"> <img width="800px" height="auto" class="img-fluid" src=<?php echo ( $file['lien_local']); ?> alt=<?php echo $file['nom']; ?>> </a><br>
                    <div class="card-footer text-muted">
                    <span > Ajouter le : <?php echo ( $file['date_ajout']); ?></span>
                    <p> Lien pour partager l'image : index.php?action=affiche_file&lien=<?php echo $file['lien_url']; ?></p>
                    <button class="btn btn-outline-secondary mt-2"><a style="text-decoration: none; color:#515151FF " href="index.php?action=suppression&id=<?php echo ( $file['ID']); ?>">Supprimer le fichier</a></button>
                    </div>

                 </div>
             </div>
         </div>           
         </figure>     

<?php endforeach; }?>

</div>
