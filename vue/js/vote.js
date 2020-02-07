function vote(id,vote)
{
	//recup les 2 span vote
	let target=$(event.target);
	let targetUp=$(event.target).parent().children( ".icon-thumb_up_alt" );
	let targetDown=$(event.target).parent().children( ".icon-thumb_down_alt" );
	$(document).ready(function(){

	$(function()
	{
		//envoie vote et id en ajax
		$.ajax({
			url:'APIVote.php',
			type:'POST',
			data: {vote:vote, id:id},
			dataType:'text' 
		})

		.done(function(data){ 
			
			let data2=JSON.parse(data);
			//recup donnée et affichage vote actualisés
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
