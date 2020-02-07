<?php $this->titre = "Suppression" ?>
<div style="text-align: center;" class="alert alert-danger mt-2" role="alert">
<p> Etes vous sur de vouloir supprimer cette image?</p>
</div>
<div class="container">
	<div class="form-group" style="text-align: center;">
		<form method="POST" action="">
			<input  class="btn btn-danger" type="submit" id="oui" name="oui" value="Oui"> 
			<input class="btn btn-secondary" type="submit" id="non" name="non" value="Non">
		</form>
	</div>
</div>