<?php 

require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurUser.php';  
require_once 'Modele/file.php';

/**
 * 
 */
class ControleurProfil extends ControleurUser
{
	private $file;

	function __construct()
	{
		parent::__construct();
		$this->file = new file($this->login);
	}

	function vueImage(){

		$listeFile = $this->file->getFileByUser();
	
		$vue = new Vue('profil', $this->login);
		$vue->generer(array('listeFile' => $listeFile));



	}

}