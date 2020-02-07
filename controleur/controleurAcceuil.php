<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';   
require_once 'Modele/File.php';
require_once 'Modele/Vote.php';

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
    //recup fichier
    $liste_file=$this->file->getFile();
    //pour chaque fichier
    foreach ($liste_file as $key => $value) 
    {
      //recup vote
      $vote=new vote($this->login,$value['ID']);
      $nbVoteUp=$vote->getNbVote(1);
      $nbVoteDown=$vote->getNbVote(-1);
      //ajouter à la liste
      $liste_file[$key]['voteUp']=$nbVoteUp;
      $liste_file[$key]['voteDown']=$nbVoteDown;
      //recup tag
      $tag= new tag($value['ID'],$this->login);
      $tags=$tag->getTagImage();
      $liste_file[$key]['tag']=$tags;
    }
    //générer vue
    $vue = new Vue("Acceuil",$this->login);
    $vue->generer(array('listeFile' => $liste_file,'login'=>$this->login));
  } 
}