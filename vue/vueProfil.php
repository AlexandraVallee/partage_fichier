<?php $this->titre = "Profil de ".$this->login; ?>

<?php if(isset($erreur)){echo $erreur;} ?>
<div class="gallery" id="gallery">

<?php
if(isset($listeFile)){
foreach($listeFile as $file):

    ?>
<figure class="figure" style=" height: auto; width: 800px;">
   <div class="mb-3 pics animation all 2">

   			<div class="card mt-2 mr-2 ml-4">
		
		<div class="card-body">

                    <h2 class="card-title" style="text-align: center;" ><?php echo $file['nom']; ?></h2>
                        <?php 
                    if($login===null)
                        { ?>
                        <h3><span class=" icon-thumb_up_alt"> <?= $file['voteUp']; ?> </span><span class="icon-thumb_down_alt"><?= $file['voteDown']; ?></span> </h3> <?php ;};?>
                   <?php if($login!=null)
                    { ?>
                        <h3><span class=" icon-thumb_up_alt" onclick="vote(<?= ( $file['ID']); ?>,'up')"> <?= $file['voteUp']; ?> </span><span class="icon-thumb_down_alt" onclick="vote(<?= ( $file['ID']); ?>,'down')"><?= $file['voteDown']; ?></span> </h3>
                   <?php } ?>
                    <a href="index.php?action=affiche_file&lien=<?php echo ( $file['lien_url']); ?>"> <img width="auto" height="500px" class="img-fluid" src=<?php echo ( $file['lien_affichage']); ?> alt=<?php echo $file['nom']; ?>> </a><br>
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

<script src="Vue/js/vote.js"defer></script>
