function change()
{
	let target=$(event.target)
	var vide=false;
	$(document).ready(function()
	{
		//si le champs tag target est rempli
        if(target.val())
        {
        	//verif si tous les autres champs tag sont remplis
            $('#ajoutFileForm input[name="tag[]"]').each(function()
        	{
        		if(!$(this).val())
        		{ 
        			vide=true
        		}
        	})
            //si tous les champ sont remplis et qu'il n'y en max 5 en ajouter un autre
        	if($('#ajoutFileForm input[name="tag[]"]').length<5 && vide===false )
        	{
            	$('#tag').append('<input class="form-control" type="text" placeholder="ex : #licorne" name="tag[]" onchange="change()">');
        	} 
    	}
	});
}