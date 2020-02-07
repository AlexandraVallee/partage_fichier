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
            
                <div><h2 ><?php echo $file['nom']; ?>
                      <h3><?php foreach($file['tag'] as $tag): ?>
                          <?= urldecode($tag['nom'])?>
                        <?php endforeach?></h3>
                </h2></div>
                    <?php 
                    if($login===null)
                        { ?>
                       
                        <h3>

                        <span class=" icon-thumb_up_alt"> <?= $file['voteUp']; ?> </span><span class="icon-thumb_down_alt"><?= $file['voteDown']; ?></span> </h3> <?php ;};?>
                   <?php if($login!=null)
                    { ?>
                        <h3><span class=" icon-thumb_up_alt" onclick="vote(<?= ( $file['ID']); ?>,'up')"> <?= $file['voteUp']; ?> </span><span class="icon-thumb_down_alt" onclick="vote(<?= ( $file['ID']); ?>,'down')"><?= $file['voteDown']; ?></span> </h3>
                   <?php } ?>
                <a href="index.php?action=affiche_file&id=<?php echo ( $file['ID']); ?>"> <img class="img-fluid mt-4" style="width: auto; height: 500px;"src=<?php echo ( $file['lien_affichage']); ?> alt=<?php echo $file['nom']; ?>> </a><br>
                <div class="card-footer text-muted">
                    <span ><?php $d = new DateTime($file['date_ajout']); echo ( ' rajouté le '.$d->format('d-m-Y \a H:i:s ')); ?></span>
                </div>
            </div>
        </div>
    </div>           
</figure>     

<?php endforeach; }?>

</div>
<script src="Vue/js/vote.js"defer></script>
