<?php
session_start();
require_once 'controleur/controleurCommentaire.php';

$target=explode('&',$_POST['target']);

		if(explode('=',$target[1])[0]=='lien')
		{
			$lien=urldecode(explode('=',$target[1],2)[1]);
		}
		if(explode('=',$target[0])[0]=='commentaire')
		{
			$commentaire=urldecode(explode('=',$target[0],2)[1]);
		}
		if(isset($lien)&&isset($commentaire))
		{
			$ControleurCommentaire=new ControleurCommentaire();
			$commentaire=$ControleurCommentaire->commenter($commentaire,$lien);
			echo $commentaire;
		}
		else
		{
			echo("erreur");
		}




