<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';  
require_once 'Modele/file.php';
require_once 'Modele/commentaire.php';  
require_once 'Modele/Vote.php';

class ControleurUniImg extends ControleurUser
{
	private $file;
    private $commentaire;
    public function __construct() 
    { 
        //test de connexion, récupérer login
        parent::__construct();  
        $this->file = new file($this->login);
        $this->commentaire = new Commentaire($this->login); 
    }

    public function affiche()
    {
    	//recup fichier et commentaires
        //si on a l'id dans l'url
        if(isset($_GET['id']))
        {
    		$image_find=$this->file->getFile($_GET['id'], null, null, null);
            $com_img = $this->commentaire->getCommentaires($_GET['id']);
            $vote=new vote($this->login,$_GET['id']);
    		$erreur = "";
    	}
        //si on a le lienUrl dans l'url
    	else if (isset($_GET['lien']))
        {
    		$image_find=$this->file->getFile(null, null,$_GET['lien'], null);
            $com_img = $this->commentaire->getCommentaires($image_find[0]['ID']);
            $vote=new vote($this->login,$image_find[0]['ID']);
    		$erreur = "";
    	}
    	else
        {
    		$erreur = "une erreur est survenue";
    	}
        //recup vote et tags
        $nbVoteUp=$vote->getNbVote(1);
        $nbVoteDown=$vote->getNbVote(-1);
        $tag= new tag($image_find[0]['ID'],$this->login);
        $tags=$tag->getTagImage();
        
        //génération vue
        $vue = new Vue("Image", $this->login);
        $vue->generer(array('image' => $image_find[0],'commentaires'=>$com_img, 'erreur' => $erreur,'login'=>$this->login,'nbVoteUp' => $nbVoteUp,'nbVoteDown' => $nbVoteDown,'tags'=>$tags));
    }   
}

