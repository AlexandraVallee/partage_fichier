<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';   
require_once 'Modele/File.php';

class ControleurSearch extends ControleurUser
{
    private $file;
    public function __construct() 
    { 
        //test de connexion, récupérer login
        parent::__construct();  
        $this->file = new file($this->login);   
    } 

    
    public function Recherche() 
    { 
        if(isset($_POST['submitSearch']))
        {
            if(!empty($_POST['q']))
            {
                $motsCles=trim(strip_tags($_POST['q'])); //sanitize
                if($motsCles!="")
                {
                    $motsCles = explode(' ',$motsCles); //retourne tableau mot clés
                    $nombreMots=count($motsCles);
                    for ($i =0; $i<$nombreMots; $i++) //nettoyage tableau
                    {
                        if (!strlen($motsCles[$i])) 
                        {
                            unset($motsCles[$i]);
                        } 
                        else 
                        {
                            $motsCles[$i] = addslashes(strip_tags($motsCles[$i]));
                        }
                    }
                    $nombreMots=count($motsCles);
                    $listeFile=$this->file->getFile(null,[$nombreMots,$motsCles],null,null);
                    /*$rechercheSurlignee=[];
                    while($res = $this->file->fetch(PDO::FETCH_ASSOC))
                    {
                        for ($k=0;$k<$nombreMots;$k++)
                        {
                            $res['nom']=$this->file->Surligner($motsCles[$k],$res['titre']);
                            
                        }
                        array_push($rechercheSurlignee,array('titre'=>$res['titre'],'date_creation'=>$res['date_creation'],'contenu'=>$res['contenu']));
                    }*/
                   
                    $vue = new Vue("Search",$this->login);
                    $vue->generer(array('listeFile' => $listeFile));
                }
            }   
            else
            {
                $erreur=("veuillez spécifiez au moins un mot clé");
                $vue = new Vue("Search",$this->login);
                $vue->generer(array('erreur' => $erreur));
                
                
            }   
        }
    } 
}