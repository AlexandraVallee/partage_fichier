<?php
require_once 'Modele/Vote.php';
require_once 'Controleur/ControleurUser.php';   

class ControleurVote extends ControleurUser
{
  private $file;
  public function __construct() 
  { 
      //test de connexion, récupérer login
      parent::__construct();   
  } 
 
  public function vote($vote,$id) 
  { 
      
    $this->vote = new vote($this->login,$id);  

    if($vote=='up')
    {
      $up=1;
      $alreadyVote=$this->vote->getVote();
     
      if($alreadyVote==0)
      {
       
        $this->vote->setVote($up);
      }
      else
      {
       
        $this->vote->updateVote($up);
      }
     
    }
    else if($vote=='down')
    {
      $up= -1;
      $alreadyVote=$this->vote->getVote();
      if($alreadyVote==0)
      {
        $this->vote->setVote($up);
      }
      else
      {
        $this->vote->updateVote($up);
      }
     
     
    } 
    
    $nbVoteUp=$this->vote->getNbVote(1);
    $nbVoteDown=$this->vote->getNbVote(-1);
    $nbVote=json_encode(['voteup'=>$nbVoteUp,'votedown'=>$nbVoteDown]);
      return($nbVote);
  }
}