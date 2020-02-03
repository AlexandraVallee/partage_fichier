<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';   

class ControleurAcceuil extends ControleurUser
{
    public function __construct() 
    { 
        //test de connexion, récupérer login
        parent::__construct();     
    } 

    
    public function acceuil() 
    { 
    

        $vue = new Vue("Acceuil",$this->login);
        $vue->generer(array('' => ''));
    }  
}