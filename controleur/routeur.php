<?php
require_once 'Controleur/controleurAcceuil.php';
require_once 'Vue/Vue.php';
require_once 'Controleur/controleurUser.php';
require_once 'Controleur/controleurAjoutFichier.php';
require_once 'Controleur/controleurSearch.php';
require_once 'Controleur/controleurProfil.php';
require_once 'Controleur/controleurUniImg.php';
require_once 'Controleur/controleurSuppression.php';
require_once 'Controleur/controleurCommentaire.php';

class Routeur {

    private $controleurAcceuil;
    private $controleurUser;
    private $controleurAjoutFichier;
    private $action;
    private $controleurSearch;
    private $controleurProfil;
    private $controleurSuppression;
    private $controleurUniImg;

    public function __construct()
    {
        $this->action=null; 
        $this->controleurAcceuil=null;$this->action=null;$this->controleurUser=null;
        $this->controleurSuppression=null;$this->controleurSearch=null;$this->controleurProfil=null;$this->controleurUniImg=null;$this->controleurAjoutFichier=null;
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
        else if($this->action=='fichier_ajout')//formulaire ajout
        {
            $this->controleurAjoutFichier = new ControleurAjoutFichier();
            $this->controleurAjoutFichier->ajoutFichier();
        }
        else if($this->action=='import')//formulaire validé ajout de fichier
        {
            $this->controleurAjoutFichier = new ControleurAjoutFichier();
            $this->controleurAjoutFichier->import();
        }
        else if($this->action=='search')//recherche
        {
            $this->controleurSearch=new controleurSearch();
            $this->controleurSearch->Recherche();
        }
        else if($this->action=='profil')//liste img user
        {
            $this->controleurProfil=new controleurProfil();
            $this->controleurProfil->vueImage();
        }
        else if($this->action=='affiche_file')//image seule
        {
            $this->controleurUniImg = new controleurUniImg();
            $this->controleurUniImg->affiche();
        }
         else if($this->action=='suppression')//suppression image
        {
            $this->controleurSuppression = new controleurSuppression();
            $this->controleurSuppression->supprimer();
        } 
        
        //si pas d'action ou action non valide afficher la page d'acceuil
        else
        {
            $this->controleurAcceuil=new ControleurAcceuil();
            $this->controleurAcceuil->acceuil();        
        }
    }
}