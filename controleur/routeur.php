<?php
require_once 'Controleur/controleurAcceuil.php';
require_once 'Vue/Vue.php';
require_once 'Controleur/controleurUser.php';
require_once 'Controleur/controleurAjoutFichier.php';

class Routeur {

    private $controleurAcceuil;
    private $controleurUser;
    private $controleurAjoutFichier;
    private $action;

    public function __construct()
    {
         $this->action=null; 
         $this->controleurAcceuil=null;$this->action=null;$this->controleurUser=null;
    }

    // Traite une requête entrante
    public function routerRequete() 
    {
       //garder en memoire page visitée pour rediriger dessus lors de la déconnexion
       if(isset($_GET['action'])&&$_GET['action']!='deconnexion'||!isset($_GET['action']))
        {
            $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
        }
        
        if (isset($_GET['action'])) 
        {
            $this->action=$_GET['action'];
        }
       
        if($this->action=='deconnexion')
        {
            $this->controleurUser=new ControleurUser;
            $this->controleurUser->Deconnexion();
        }
        else if($this->action=='fichier_ajout')
        {
            $this->controleurAjoutFichier = new ControleurAjoutFichier();
            $this->controleurAjoutFichier->ajoutFichier();
        }
        else if($this->action=='import')
        {
            $this->controleurAjoutFichier = new ControleurAjoutFichier();
            $this->controleurAjoutFichier->import();
        }
        /* ajout route
        else if($this->action=='XX')
        {
            $this->controleurXX=new ControleurXX;
            $this->controleurXX->xx();
        }*/
        
        //si pas d'action ou action non valide afficher la page d'acceuil
        else
        {
            $this->controleurAcceuil=new ControleurAcceuil();
            $this->controleurAcceuil->acceuil();        
        }
    }
}