<?php $this->titre = "Partage'chou"; ?>
<div class="offset-lg-8 col-lg-4">
<button type="button" class="btn btn-outline-dark" onclick="affichage('gallerie')">Gallerie</button> 
<button type="button" class="btn btn-outline-dark" onclick="affichage('tuile')" >Tuile</button> 
<button type="button" class="btn btn-outline-dark" onclick="affichage('liste')">Liste</button>
</div>
<section id="affichage" class="photos">
<?php
foreach($listeFile as $file):

    ?>
<figure class="figure ">
   			<div class="card"> 
   				<div name ="card" class="card-body">
                   <div> <h2 style="text-align: center;" ><?= $file['nom']; ?> 
                    <?php foreach($file['tag'] as $tag): ?>
                          <h3> <?= urldecode($tag['nom'])?></h3>
                        <?php endforeach?>
                       </h2>
                   	<?php 
                   	if($login===null)
                   		{ ?>
                       
                   		<h3>

                        <span class=" icon-thumb_up_alt"> <?= $file['voteUp']; ?> </span><span class="icon-thumb_down_alt"><?= $file['voteDown']; ?></span> </h3> <?php ;};?>
                   <?php if($login!=null)
                   	{ ?>
                   		<h3><span class=" icon-thumb_up_alt" onclick="vote(<?= ( $file['ID']); ?>,'up')"> <?= $file['voteUp']; ?> </span><span class="icon-thumb_down_alt" onclick="vote(<?= ( $file['ID']); ?>,'down')"><?= $file['voteDown']; ?></span> </h3>
                   <?php } ?>
                   </div>
                   <div name="affichageImg" class="">
                    <a href="index.php?action=affiche_file&id=<?= ( $file['ID']); ?>"> <img class="img-fluid gallerie" src=<?= ( $file['lien_affichage']); ?> alt=<?= $file['nom']; ?>> </a><br>
             </div>
         </div>
                   
         </div>           
         </figure> <br>    

<?php endforeach; ?>

</section>

<script src="Vue/js/modeAffichage.js"defer></script>
<script src="Vue/js/vote.js"defer></script>