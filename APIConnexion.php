<?php
require_once 'Modele/ControleUser.php';
//démarrez la session commme on ne passe pas par l'index
session_start();
$action = $_POST['action'];
$target=[];
$mdp=null;
$mdp2=null;
$email=null;
$login=null;
$resterConnecter=false;
$reponse=[];
$connexionAutorisee=false;

//selon action connexion ou inscription
switch ($action) {
	case "connexion":
		//récupérer les datas 
		$target=explode('&',$_POST['target']);
		if(explode('=',$target[1])[0]=='mot_de_passe_connexion')
		{
			$mdp=urldecode(explode('=',$target[1],2)[1]);
		}
		if(explode('=',$target[0])[0]=='pseudo_connexion')
		{
			$login=urldecode(explode('=',$target[0],2)[1]);
		}
		if(explode('=',$target[2])[0]=='resterConnecter')
		{
			$resterConnecter=true;
		}
		//si tous les champs sont remplis
		if($login!=null&&$mdp!=null)
		{
			$controleUser=new ControleUser($login,$mdp);
			$loginExiste=$controleUser->getLogin(); //verif login existe
			if($loginExiste==1)//verif pwd correspond
			{
				$pwdEnregistre=$controleUser->Connexion();
				if(password_verify($mdp, $pwdEnregistre))
          		{
			        $connexionAutorisee=true;
			        $reponse=['success'=>true,'location'=>$_SESSION['redirect']];
			        $_SESSION['login']=$login;
			        if($resterConnecter==true)
			        {
			            $contenu = $login;
			            setcookie("cookie_connexion", $contenu, time()+31540000);
			            $cleId=$_SERVER['REMOTE_ADDR'];
			            setcookie("cookie_cle_connexion", $cleId, time()+31540000);
			        }
			    }
			    else
			    {
			        	
			       	$reponse=['success'=>false,'erreur'=>'login ou mot de passe incorrect'];
	   			}
			}    	
			else
			{	
			    $reponse=['success'=>false,'erreur'=>'login ou mot de passe incorrect'];
			}
		}          	
        else
        {
          	$reponse=['success'=>false,'erreur'=>'veuillez remplir tous les champs'];
	   	}
      
		echo json_encode($reponse);
		break;
//////////////////////inscription/////////////////////		
	case "inscription":
		$target=explode('&',$_POST['target']);
		if(explode('=',$target[0])[0]=='pseudo')
		{
			$login=htmlspecialchars(urldecode(explode('=',$target[0],2)[1]));
		}
		if(explode('=',$target[1])[0]=='email')
		{
			$email=htmlspecialchars(urldecode(explode('=',$target[1],2)[1]));
		}
		if(explode('=',$target[2])[0]=='mot_de_passe')
		{
			$mdp=htmlspecialchars(urldecode(explode('=',$target[2],2)[1]));
		}
		
		if(explode('=',$target[3])[0]=='mot_de_passe2')
		{
			$mdp2=htmlspecialchars(urldecode(explode('=',$target[3],2)[1]));
		}
		if($login!=null&&$mdp!=null&&$mdp2!=null&&$email!=null)
		{
			if((preg_match('#^(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#', $mdp)))
					//vérification mdp contient une maj, un chiffre, un nb, un carac spécial et 8 carac
			{
				$mdp=password_hash($mdp,PASSWORD_DEFAULT);//cryptage mdp

				if(password_verify($mdp2, $mdp)) //vérif mdp identiques
				{
					//faire l'inscription
					$controleUser=new ControleUser($login,$mdp);
					$InscriptionAutorisee=$controleUser->VerifInscription($email);
					if($InscriptionAutorisee==0)
					{
						
						$controleUser->Inscription($email);
						$reponse=['success'=>true,
							'message'=>"Vous avez bien été enregistré.<br>Vous pouvez maintenant vous connecter"];					
					}
					else
			        {
			        	$reponse=['success'=>false,'erreur'=>'pseudo ou mail déjà utilisé'];
	   				}
				}
				else
			    {
			        $reponse=['success'=>false,'erreur'=>'les 2 mots de passe ne correspondent pas'];
	   			}
			}
			else
			{
			    $reponse=['success'=>false,'erreur'=>'le mot de passe doit contenir au moins un caractère spécial, une majuscule, un chiffre et 8 caractères'];
	   		}		
		}
		else
		{
			$reponse=['success'=>false,'erreur'=>'veuillez remplir tous les champs'];
	   	}
	   	echo json_encode($reponse);
		break;
}