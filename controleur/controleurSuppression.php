<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';  
require_once 'Modele/file.php';  
require_once 'Modele/commentaire.php';  
require_once 'Modele/vote.php';  

class ControleurSuppression extends ControleurUser
{
	private $file;
    public function __construct() 
    { 
        //test de connexion, récupérer login
        parent::__construct();  
        $this->file = new file($this->login);   
    }

    public function supprimer()
    {
    	//si choix oui
        if(isset($_POST['oui']))
    	{
    		//suppression vote, commentaires,tag_image puis fichier
            $id=$_GET['id'];
            $this->vote=new vote($this->login,$id);
            $this->vote->supprimer();
            $this->commentaire=new commentaire($this->login);
            $this->commentaire->supprimer($id);
            $this->tag=new Tag($id,null);
            $this->tag->supprimer();
    		$this->file->supprimer($id);
    		header('Location: index.php?action=profil');
    	}
        //si choix non rediriger vers profil
    	else if(isset($_POST['non']))
    	{
    		header('Location: index.php?action=profil');
    	}

    	else
    	{
    		$vue = new Vue("Suppression", $this->login);
        	$vue->generer(array('' => ''));
        }
    }
}