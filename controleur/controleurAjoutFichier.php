<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';  
require_once 'Modele/file.php';  

class ControleurAjoutFichier extends ControleurUser
{
    private $fichier;
    private $id;
    private $nom;
    private $lienLocal;
    private $lienUrl;
    private $statut;
    private $createdAt;

    public function __construct() 
    { 
        //test de connexion, récupérer login
        parent::__construct();
        $this->createdAt = new DateTime("NOW");     
    } 

    public function ajoutFichier()
    {
            $vue = new Vue("ImportImage", $this->login);
            $vue->generer(array('' => '' ));
    }
        public function import()
    {

        $dossier = 'upload/';
        $fichier = basename($_FILES['fichier']['name']);
        $taille_maxi = 100000;
        $taille = filesize($_FILES['fichier']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['fichier']['name'], '.'); 
        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
             $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
        }
        if($taille>$taille_maxi)
        {
             $erreur = 'Le fichier est trop gros...';
        }


        if(isset($_post['submit']) && !$erreur){

            $this->fichier = new File();
            
        
            $this->nom = $_post['nom'];
            $this->lienUrl = crypt($_FILES['fichier']['tmp_name']);
            $this->lienLocal = $_FILES['fichier']['tmp_name'];
            $this->statut = $_post['drone'];

            $this->fichier->ajoutFichier($this->nom,$this->lienLocal,$this->statut,$this->lienUrl,$this->dateAjout);

            $fichier = strtr($fichier, 
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                echo 'Upload effectué avec succès !';
            }
            else //Sinon (la fonction renvoie FALSE).
            {
                echo 'Echec de l\'upload !';
            }
        }
        elseif(isset($_post['submit']) && $erreur)
        {
            echo $erreur;
        }
    }





}

