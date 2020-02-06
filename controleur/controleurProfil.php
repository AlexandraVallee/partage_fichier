<?php 

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';  
require_once 'Modele/file.php';
require_once 'Modele/Vote.php';


class ControleurProfil extends ControleurUser
{
	private $file;

	function __construct()
	{
		parent::__construct();
		$this->file = new file($this->login);
	}

	function vueImage()
	{

		$listeFile = $this->file->getFileByUser();
		foreach ($listeFile as $key => $value) 
        {
           $vote=new vote($this->login,$value['ID']);
           $nbVoteUp=$vote->getNbVote(1);
           $nbVoteDown=$vote->getNbVote(-1);
           $listeFile[$key]['voteUp']=$nbVoteUp;
           $listeFile[$key]['voteDown']=$nbVoteDown;
           $tag= new tag($value['ID'],$this->login);
            $tags=$tag->getTagImage();
            $listeFile[$key]['tag']=$tags;
        }
		$vue = new Vue('profil', $this->login);
		$vue->generer(array('listeFile' => $listeFile,'login'=>$this->login));



	}

}