<?php
require_once'modele/connexion_bdd.php';
class ControleUser extends connexion_bdd
{
  
  private $login;
  private $pwd;
  private $mail;
  private $connexionAutorisee;    

  public function __construct($login =null,$pwd =null)
  {
    $this->login=$login;$this->pwd=$pwd;$this->mail=null;
    $this->connexionAutorisee=false;
  }

//verif pseudo existe
  public function getLogin()
  {
    try
    {
      $verificationLogin ="SELECT COUNT(pseudo) FROM user WHERE pseudo=? ";
      $param=[array(1,$this->login,PDO::PARAM_STR) ];
      $loginExiste=$this->executerRequete($verificationLogin,$param);
    }
    catch(Exception $e)
    {
      echo " Erreur ! ".$e->getMessage(); die;
    }
    $result=$loginExiste->fetchColumn(); 
    return $result;  
  }

//verif mail existe
  public function CountMail($mail)
  {
    $this->mail=$mail;
    try
    {
      $verificationMail ="SELECT COUNT(mail) FROM user WHERE mail=? ";
      $param=[array(1,$this->mail,PDO::PARAM_STR) ];
      $mailExiste=$this->executerRequete($verificationMail,$param);
    }
    catch(Exception $e)
    {
      echo " Erreur ! ".$e->getMessage(); die;
    }
    $result=$mailExiste->fetchColumn();  
    return $result;  
  }

//selection pwd selon pseudo
  public function Connexion()
  {
    try
    {
      $verificationPwd = "SELECT password FROM user WHERE pseudo=?";
      $param=[array(1,$this->login,PDO::PARAM_STR)];
      $verificationPwd=$this->executerRequete($verificationPwd,$param);
    }
    catch(Exception $e)
    {
      echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
    }
    $result2=$verificationPwd->fetch(PDO::FETCH_ASSOC);
    $pwdEnregistre=$result2['password'];
    return $pwdEnregistre;  
  }

//verif pseudo ou mail pas déjà utilisés
  public function verifInscription($mail)
  {
    try 
    {
      $verificationLogin ="SELECT COUNT(pseudo),COUNT(mail) FROM user WHERE pseudo=? OR mail=?";
      $param=[array(1,$this->login,PDO::PARAM_STR),array(2,$mail,PDO::PARAM_STR)];          
      $verificationLogin=$this->executerRequete($verificationLogin,$param);
      $result=$verificationLogin->fetchColumn();
    }
    catch(Exception $e)
    {
      echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
    }
    return $result;
  }

//ajout user bdd
  public function Inscription($mail)
  {
    try
    {
      $ajoutUtilisateur ="INSERT INTO user(password, mail, pseudo) VALUES(?, ?, ?) "; 
      $param=[array(1,$this->pwd,PDO::PARAM_STR),array(2,$mail,PDO::PARAM_STR),array(3,$this->login,PDO::PARAM_STR)];
      $ajoutUtilisateur=$this->executerRequete($ajoutUtilisateur,$param);
    }
    catch(Exception $e)
    {
      echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
    }
  }  
}
