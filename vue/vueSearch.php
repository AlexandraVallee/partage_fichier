<?php $this->titre = "Recherche"; ?>


<?php 
if(isset($erreur)){
?>
<div class="alert alert-danger mt-2" style="text-align: center" role="alert">
<?php echo $erreur;
} 
?>
</div>


<?php
if(isset($listeFile)){
foreach($listeFile as $file):

    ?>
<figure class="figure">
    <div class="mb-3 pics animation all 2">
        <div class="card mt-4 ml-5"> 
   		    <div class="card-body">
            
                <div><h2 ><?php echo $file['nom']; ?></h2></div>
                <a href="index.php?action=affiche_file&id=<?php echo ( $file['ID']); ?>"> <img class="img-fluid mt-4" style="width: auto; height: 500px;"src=<?php echo ( $file['lien_local']); ?> alt=<?php echo $file['nom']; ?>> </a><br>
                <div class="card-footer text-muted">
                    <span ><?php echo ( $file['date_ajout']); ?></span>
                </div>
            </div>
        </div>
    </div>           
</figure>     

<?php endforeach; }?>

</div>
