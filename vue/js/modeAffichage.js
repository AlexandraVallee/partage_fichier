
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