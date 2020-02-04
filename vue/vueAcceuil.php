<?php $this->titre = "Partage'chou"; ?>

<form class="search" method="POST" action="index.php?action=search">
				<input class="form-control"  type="search" name="q" placeholder="Search" aria-label="Search">
				<input class="btn btnSearch" type="submit" name="submitSearch" value="Search" ></input>
				</form>

<div class="gallery" id="gallery">
<?php 
foreach($listeFile as $file):

    ?>
<figure class="figure">
   <div class="mb-3 pics animation all 2">
                    <h2 ><?php echo $file['nom']; ?></h2>
                    <a href="index.php?action=affiche_file&id=<?php echo ( $file['ID']); ?>"> <img class="img-fluid" src=<?php echo ( $file['lien_local']); ?> alt=<?php echo $file['nom']; ?>> </a><br>
                    <span ><?php echo ( $file['date_ajout']); ?></span>
         </div>           
         </figure>     

<?php endforeach; ?>

</div>

<div class="container">
  <section class="row ">
<?php 
foreach($listeFile as $file):

    ?>

   <div class="col-lg-3 col-md-4 col-6">
                    <h2 ><?php echo $file['nom']; ?></h2>
                    <div class="imageRogner">
                    <a href="index.php?action=affiche_file&id=<?php echo ( $file['ID']); ?> class="d-block mb-4 h-100"> <img class="img-fluid img-thumbnail " src=<?php echo ( $file['lien_local']); ?> alt=<?php echo $file['nom']; ?>> </a></div><br>
                    <span ><?php echo ( $file['date_ajout']); ?></span>
         </div>           
           

<?php endforeach; ?>
</section>
</div>
