<?php
//démarrez la session commme on ne passe pas par l'index
session_start();
require_once 'controleur/controleurCommentaire.php';
//récupérer les données du form
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
			//créer un controleurcommentaire et appeler la fonction commenter
			$ControleurCommentaire=new ControleurCommentaire();
			$commentaire=$ControleurCommentaire->commenter($commentaire,$lien);
			//retourner le résultat au js
			echo $commentaire;
		}
		else
		{
			echo("erreur");
		}




