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
            $vue->generer(array('login' => $this->login ));
    }
        public function import()
    {

        if(isset($_POST['submit'])){
            $dossier = 'librairies/uploads/';
            $fichier = basename($_FILES['fileToUpload']['name']);
            $taille_maxi = 1000000;
            $taille = filesize($_FILES['fileToUpload']['tmp_name']);
            $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.txt', '.doc', '.odt');
            $extension = strrchr($_FILES['fileToUpload']['name'], '.'); 
            //Début des vérifications de sécurité...
            if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
            {
                 $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
            }
            if($taille>$taille_maxi)
            {
                 $erreur = 'Le fichier est trop gros...';
            }


            if(!isset($erreur)){

                $this->fichier = new File($this->login);
                
            
                $this->nom = $_POST['nom'];
                $this->lienUrl = "index.php?action=affiche_file&lien=".hash_file('md5',$_FILES['fileToUpload']['tmp_name']);
                $newName = preg_replace('/([^A-Za-z0-9._]+)/i', '-', $_FILES['fileToUpload']['name']);
                $this->lienLocal ="librairies/uploads/".$newName; 
                if(isset($_POST['drone']))
                {
                    $this->statut = $_POST['drone'];
                }
                else
                {
                    $this->statut = 'public';
                }

                if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $dossier . $newName)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                {
                    $this->fichier->ajoutFile($this->nom,$this->lienLocal,$this->statut,$this->lienUrl,$this->createdAt->format('Y-m-d H:i:s'));
                    if($this->login===null)
                    {
                        header('Location: index.php');
                    }
                    else
                    {
                         header('Location: index.php?action=profil');
                    }
                }
                else //Sinon (la fonction renvoie FALSE).
                {
                    $erreur = 'Echec de l\'upload !';
                }
            }
        }
        
        $vue = new Vue("ImportImage", $this->login);
        $vue->generer(array('erreur' => $erreur,'login'=>$this->login ));
    }





}

