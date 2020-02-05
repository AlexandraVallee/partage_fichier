
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