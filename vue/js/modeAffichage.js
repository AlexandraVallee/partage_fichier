function affichage(mode)
{
	$(document).ready(function()
	{
		//virer toutes les classes 
		$('#affichage').removeClass();
		$('div[name="affichageImg"]').each(function(){ $(this).removeClass();});
		console.log($('div[name="affichageImg "] img'))
		$('div[name="affichageImg"] img').each(function(){ $(this).removeClass();})	;
		$('div [name="card"]').each(function(){ $(this).removeClass();})	;
		
	//changer les classes suivant l'affichage choisi
		if(mode==="liste")
		{
			$('div [name="card"]').each(function(){ $(this).addClass('card-body ');});
			$('#affichage').addClass('liste');
			$('div[name="affichageImg"] img').each(function(){ $(this).addClass('img-fluid liste');})	;
			$('div[name="affichageImg"]').each(function(){ $(this).addClass('liste');});
		}
		else if(mode==="gallerie")
		{
			$('div [name="card"]').each(function(){ $(this).addClass('card-body');});
			$('#affichage').addClass('photos');
			$('div[name="affichageImg"] img').each(function(){ $(this).addClass('img-fluid gallerie');})	;
		}
		else if(mode==="tuile")
		{
			
			$('#affichage').addClass('photos');
			$('div[name="affichageImg"]').each(function(){ $(this).addClass('uniform');});
			$('div [name="card"]').each(function(){ $(this).addClass('card-body tuile2');});
			$('div[name="affichageImg"] img').each(function(){ $(this).addClass('img-fluid tuile');})	;
		}
	});
}