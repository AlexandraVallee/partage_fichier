<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';  
require_once 'Modele/file.php';  
require_once 'Modele/tag.php';  

class ControleurAjoutFichier extends ControleurUser
{
    private $fichier;
    private $id;
    private $nom;
    private $lienLocal;
    private $lienUrl;
    private $lienAffichage;
    private $statut;
    private $createdAt;

    public function __construct() 
    { 
        //test de connexion, récupérer login
        parent::__construct();
        $this->createdAt = new DateTime("NOW");     
    } 

    //vue page ajout fichier
    public function ajoutFichier()
    {
        $vue = new Vue("ImportImage", $this->login);
        $vue->generer(array('login' => $this->login ));
    }
    
    //si formualaire submit
    public function import()
    {
        if(isset($_POST['submit']))
        {
            $dossier = 'librairies/uploads/';
            $fichier = basename($_FILES['fileToUpload']['name']);
            $taille_maxi = 8000000;
            $taille = filesize($_FILES['fileToUpload']['tmp_name']);
            $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.txt', '.doc', '.odt', '.pdf');
            $extension = strtolower(strrchr($_FILES['fileToUpload']['name'], '.')); 
            //Début des vérifications de sécurité...
            if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
            {
                 $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
            }
            if($taille>$taille_maxi)
            {
                 $erreur = 'Le fichier est trop gros...';
            }
            //récup tag
            $tags=$_POST['tag'];
            foreach ($tags as  $tag) 
            {
               if($tag!=null)
               {
                    if(strlen($tag)>2&&strlen($tag)<31)
                    {
                        //si tag ne commence pas par # en ajouter un
                        if (preg_match('#^\##',($tag))) 
                        {
                            $nomtag=$tag;
                        }
                        else
                        {
                            $nomtag="#".$tag;
                        }
                        $listeTag[]=urlencode($nomtag);
                    }
                    else
                    {
                        $erreur ="le tag doit faire entre 3 et 30 caractères";
                    }
                }
            }

            if(!isset($erreur))//s'il n'y a pas d'erreur
            {
                $this->fichier = new File($this->login);
                $this->nom = $_POST['nom'];
                //génération lien url
                $this->lienUrl = hash_file('md5',$_FILES['fileToUpload']['tmp_name']);
                //asainir nom fichier
                $newName = preg_replace('/([^A-Za-z0-9._]+)/i', '-', $_FILES['fileToUpload']['name']);
                $this->lienLocal ="librairies/uploads/".$newName;
                //définir lien affichage selon extension
                if($extension == '.pdf')
                {
                    $this->lienAffichage = 'librairies/uploads/typePDF.png';
                }
                elseif ( $extension == '.doc' ||  $extension == '.odt' ||  $extension == '.txt') 
                {
                    $this->lienAffichage = 'librairies/uploads/typeDOC.png';
                }
                else
                {
                     $this->lienAffichage = $this->lienLocal;
                } 
                //si choix public/privé
                if(isset($_POST['drone']))
                {
                    $this->statut = $_POST['drone'];
                }
                else
                {
                    $this->statut = 'public';
                }
                //transférer fichier vers fichier destination
                if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $dossier . $newName)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                {
                    $id_file=$this->fichier->ajoutFile($this->nom,$this->lienLocal,$this->statut,$this->lienUrl,$this->createdAt->format('Y-m-d H:i:s'), $this->lienAffichage);
                    //ajout Tag au fichier
                    if($listeTag!=[])
                    {
                        foreach($listeTag as $tag)
                        {
                            $tag= new Tag($id_file,$tag);
                            $tagExiste=$tag->getTag();
                            if($tagExiste==0)
                            {
                                $tag->ajoutTag();
                            }
                            $tag->ajoutTagImage();
                        }
                    }
                    //redirection suivant si user connecté ou pas
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
        //sinon générer vue 
        $vue = new Vue("ImportImage", $this->login);
        $vue->generer(array('erreur' => $erreur,'login'=>$this->login ));
    }





}

