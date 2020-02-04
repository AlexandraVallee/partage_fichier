<?php $this->titre = "Partage'chou"; ?>

<section id="photos">
<?php 
foreach($listeFile as $file):

    ?>
<figure class="figure ">
   
                   <div> <h2 ><?php echo $file['nom']; ?></h2>
                   <div class="uniform">
                    <a href="index.php?action=affiche_file&id=<?php echo ( $file['ID']); ?>"> <img class="img-fluid tuile" src=<?php echo ( $file['lien_local']); ?> alt=<?php echo $file['nom']; ?>> </a><br>
                    
         </div>           
         </figure> <br>    

<?php endforeach; ?>

</section>
