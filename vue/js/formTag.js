
function change()
{
	let target=$(event.target)
	var vide=false;
	$(document).ready(function()
	{
		if(target.val())
        {
        	$('#ajoutFileForm input[name="tag[]"]').each(function()
        	{
        		if(!$(this).val())
        		{ 
        			vide=true
        		}
        	})
        	if($('#ajoutFileForm input[name="tag[]"]').length<5 && vide===false )
        	{
            	$('#tag').append('<input class="form-control" type="text" placeholder="ex : #licorne" name="tag[]" onchange="change()">');
        	} 
    	}
	});
}