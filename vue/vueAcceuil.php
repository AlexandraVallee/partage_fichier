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
   	
                   <div> <h2 ><?= $file['nom']; ?> </h2>
                   	<?php 
                   	if($login===null)
                   		{ ?>
                   		<h3><span class=" icon-thumb_up_alt"> <?= $file['voteUp']; ?> </span><span class="icon-thumb_down_alt"><?= $file['voteDown']; ?></span> </h3> <?php ;};?>
                   <?php if($login!=null)
                   	{ ?>
                   		<h3><span class=" icon-thumb_up_alt" onclick="vote(<?= ( $file['ID']); ?>,'up')"> <?= $file['voteUp']; ?> </span><span class="icon-thumb_down_alt" onclick="vote(<?= ( $file['ID']); ?>,'down')"><?= $file['voteDown']; ?></span> </h3>
                   <?php } ?>
                   </div>
                   <div name="affichageImg" class="">
                    <a href="index.php?action=affiche_file&id=<?= ( $file['ID']); ?>"> <img class="img-fluid gallerie" src=<?= ( $file['lien_local']); ?> alt=<?= $file['nom']; ?>> </a><br>
                   
         </div>           
         </figure> <br>    

<?php endforeach; ?>

</section>

<script> 

function vote(id,vote)
{
	let target=$(event.target);
	let targetUp=$(event.target).parent().children( ".icon-thumb_up_alt" );
	let targetDown=$(event.target).parent().children( ".icon-thumb_down_alt" );
	$(document).ready(function(){

	$(function()
	{
		$.ajax({
			url:'APIVote.php',
			type:'POST',
			data: {vote:vote, id:id},
			dataType:'text' 
		})

		.done(function(data){ 
			
			let data2=JSON.parse(data);
			$(targetUp).text(data2['voteup']);
			$(targetDown).text(data2['votedown']);
			if(vote=='up')
			{
				targetDown.css('color','black');
				targetUp.css('color','green');
			}
			if(vote=='down')
			{
				targetUp.css('color','black');
				targetDown.css('color','red');
			}
		});
	});
	});
}

function affichage(mode)
{
	$(document).ready(function(){
		$('#affichage').removeClass();
		$('div[name="affichageImg"]').each(function(){ $(this).removeClass();});
		console.log($('div[name="affichageImg "] img'))
		$('div[name="affichageImg"] img').each(function(){ $(this).removeClass();})	;
		
		//$('div[name="affichageImg"]').removeClass();
	//	$('#affichageImg img').removeClass();
		if(mode==="liste")
		{
			
			$('#affichage').addClass('liste');
			$('div[name="affichageImg"] img').each(function(){ $(this).addClass('img-fluid liste');})	;
			$('div[name="affichageImg"]').each(function(){ $(this).addClass('liste');});
			
		}
		else if(mode==="gallerie")
		{
			
			$('#affichage').addClass('photos');
			$('div[name="affichageImg"] img').each(function(){ $(this).addClass('img-fluid gallerie');})	;
			
		}
		else if(mode==="tuile")
		{
			
			$('#affichage').addClass('photos');
			$('div[name="affichageImg"]').each(function(){ $(this).addClass('uniform');});
		
			$('div[name="affichageImg"] img').each(function(){ $(this).addClass('img-fluid tuile');})	;
			
		}
});

}
</script>