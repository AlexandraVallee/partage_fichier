<?php
require_once 'Modele/ControleUser.php';

class ControleurUser
{
	protected $login;

	public function __construct()
	{
	  	$this->login=$this->verifConnexion();
	}

	//verifier si l'utilisateur est connecté 
	private function verifConnexion()
    {     
        //si variable de session login existe
        if(isset ($_SESSION['login']))
        {
          	$this->login=$_SESSION['login'];
        }
        //ou s'il existe un cookie de session
        else if(isset($_COOKIE['cookie_connexion']) && isset($_COOKIE['cookie_cle_connexion']))
        {
          	if($_COOKIE['cookie_cle_connexion']===$_SERVER['REMOTE_ADDR'])
          	{
            	$this->login= $_COOKIE['cookie_connexion'];
            	$_SESSION['login']=$this->login;
          	}
        }
        else
        {
        	$this->login=null;
        }
        return $this->login;
    }
  
	function Deconnexion()
	{
        unset($_SESSION['login']);  // supprime la variable de session login)
        if (ini_get("session.use_cookies")) // supprime le cookie de session
        { 
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
               );
        }
        if(isset($_COOKIE['cookie_connexion']))
        {
            setcookie("cookie_connexion", "", time() - 3600);
        }
        if(isset($_COOKIE['cookie_cle_connexion']))
        {
            setcookie("cookie_cle_connexion", "", time() - 3600);
        }   
        session_destroy();
        //rediriger vers dernière page visitée
		header('Location: '.$_SESSION['redirect'].'');
	 			 exit();
	}
}
