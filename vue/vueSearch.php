<?php $this->titre = "Search"; ?>
    <p>

</p>
<form class="search" method="POST" action="index.php?action=search">
				<input class="form-control"  type="search" name="q" placeholder="Search" aria-label="Search">
				<input class="btn btnSearch" type="submit" name="submitSearch" value="Search" ></input>
				</form>
<?php if(isset($erreur)){echo $erreur;} ?>
<div class="gallery" id="gallery">

<?php
if(isset($listeFile)){
foreach($listeFile as $file):

    ?>
<figure class="figure">
   <div class="mb-3 pics animation all 2">
                    <h2 ><?php echo $file['nom']; ?></h2>
                    <a href="index.php?action=affiche_file&id=<?php echo ( $file['ID']); ?>"> <img class="img-fluid" src=<?php echo ( $file['lien_local']); ?> alt=<?php echo $file['nom']; ?>> </a><br>
                    <span ><?php echo ( $file['date_ajout']); ?></span>
         </div>           
         </figure>     

<?php endforeach; }?>

</div>
