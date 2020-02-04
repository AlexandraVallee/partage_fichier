<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';   
require_once 'Modele/File.php';
require_once 'Modele/Like.php';

class ControleurAcceuil extends ControleurUser
{
    private $file;
    public function __construct() 
    { 
        //test de connexion, récupérer login
        parent::__construct();  
        $this->file = new file($this->login);   
    } 

    
    public function acceuil() 
    { 
        $liste_file=$this->file->getFile();
        foreach ($liste_file as $key => $value) 
        {
           $like=new like($this->login,$value['ID']);
           $like->getNbLike();
           $liste_file[$key]['like']=$like;
        }

        
        
           
        
        $vue = new Vue("Acceuil",$this->login);
        $vue->generer(array('listeFile' => $liste_file));
    } 
}