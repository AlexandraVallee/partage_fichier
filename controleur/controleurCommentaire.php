<?php

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';  
require_once 'Modele/file.php';
require_once 'Modele/commentaire.php';  

class ControleurCommentaire extends ControleurUser
{
	private $commentaire;
	private $date_ajout;
	private $contenu;
	private $id_user;
	private $id_image;
	private $id;


	public function __construct(){
		parent::__construct();
		$this->commentaire = new Commentaire($this->login);
        $this->date_ajout = new DateTime("NOW");
	}
	
	function commenter($commentaire,$lien){
		


				$this->contenu = htmlspecialchars(urldecode($commentaire));

				$this->commentaire->setCommentaire($this->contenu,$this->date_ajout->format('Y-m-d H:i:s'), $lien);
				$com_img = $this->commentaire->getCommentaires(null,$lien);
				return json_encode($com_img);
	}
}