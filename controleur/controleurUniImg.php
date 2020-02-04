<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';  
require_once 'Modele/file.php';  

class ControleurUniImg extends ControleurUser
{
	private $file;
    public function __construct() 
    { 
        //test de connexion, récupérer login
        parent::__construct();  
        $this->file = new file($this->login);   
    }

    public function affiche(){


    	if(isset($_GET['id'])){
    		$image_find=$this->file->getFile($_GET['id'], null, null, null);
    		$erreur = "";
    	}
    	elseif (isset($_GET['lien'])){
    		$image_find=$this->file->getFile(null, null,$_GET['lien'], null);
    		$erreur = "";
    	}
    	else{
    		$erreur = "une erreur est survenue";
    	}
        
        $vue = new Vue("Image", $this->login);
        $vue->generer(array('image' => $image_find[0], 'erreur' => $erreur, ));
    }
}

