<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';   
require_once 'Modele/File.php';

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

        
           
        
        $vue = new Vue("Acceuil",$this->login);
        $vue->generer(array('listeFile' => $liste_file));
    } 
}