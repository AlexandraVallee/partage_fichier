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
   
                   <div> <h2 ><?php echo $file['nom']; ?></h2>
                   <div id="affichageImg" class="uniform">
                    <a href="index.php?action=affiche_file&id=<?php echo ( $file['ID']); ?>"> <img class="img-fluid tuile" src=<?php echo ( $file['lien_local']); ?> alt=<?php echo $file['nom']; ?>> </a><br>
                    
         </div>           
         </figure> <br>    

<?php endforeach; ?>

</section>

<script> 

function affichage(mode)
{
	$(document).ready(function(){

		console.log(mode)
	
		$('#affichage').removeClass();
		$('#affichageImg').removeClass();
		$('#affichageImg img').removeClass();
		if(mode==="liste")
		{
			
			$('#affichage').addClass('liste');
			$('#affichageImg img').addClass('img-fluid tuile');
		}
		else if(mode==="gallerie")
		{
			
			$('#affichage').addClass('photos');
			$('#affichageImg img').addClass('img-fluid gallerie');
		}
		else if(mode==="tuile")
		{
			
			$('#affichage').addClass('photos');
			$('#affichageImg').addClass('uniform');
			$('#affichageImg img').addClass('img-fluid tuile');
		}
});

}
</script>