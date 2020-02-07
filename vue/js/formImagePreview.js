
	function get_extension(filename) {
    return filename.slice((filename.lastIndexOf('.') - 1 >>> 0) + 2);
}
	function charge(){

		 $('#affiche').children().remove();
		var file=event.target.files[0];
		var extention = '.'+get_extension(file['name']);
		console.log(extention);
		var extentions = ['.jpg', '.png', '.jpeg', '.gif'];
		for(var i=0; i<extentions.length; i++) {
			if(extention === extentions[i]) {
			
			$(document).ready(function(){
			var reader = new FileReader();
            reader.onload = function (e)
		{
            var html = "<img style='width: 200px; height: auto'src=\"" + e.target.result + "\" data-file='"+file.name+"' id='preview' class='preview mt-4'><br>" + "<br/>";
            $('#affiche').append(html);
		}
		reader.readAsDataURL(file);

		})

			}
		}

		
	};

