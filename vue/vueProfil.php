<?php $this->titre = "Profil de ".$this->login; ?>

<?php if(isset($erreur)){echo $erreur;} ?>
<div class="gallery" id="gallery">

<?php
if(isset($listeFile)){
foreach($listeFile as $file):

    ?>
<figure class="figure">
   <div class="mb-3 pics animation all 2">
                    <h2 ><?php echo $file['nom']; ?></h2>
                    <a href="index.php?action=affiche_file&lien=<?php echo ( $file['lien_url']); ?>"> <img width="800px" height="auto" class="img-fluid" src=<?php echo ( $file['lien_local']); ?> alt=<?php echo $file['nom']; ?>> </a><br>
                    <span ><?php echo ( $file['date_ajout']); ?></span>
                    <p> Lien pour partager l'image : index.php?action=affiche_file&lien=<?php echo $file['lien_url']; ?></p>
         </div>           
         </figure>     

<?php endforeach; }?>

</div>
