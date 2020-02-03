<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';   

class ControleurAjoutFichier extends ControleurUser
{
    public function __construct() 
    { 
        //test de connexion, récupérer login
        parent::__construct();     
    } 

    public function ajoutFichier()
    {
        $vue = new Vue("fichier_ajout", $this->login);
        $vue->generer(array('' => '' ));
    } 
}