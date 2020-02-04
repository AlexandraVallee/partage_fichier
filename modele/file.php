<?php
require_once'modele/connexion_bdd.php';
class File extends connexion_bdd
{

	private $user;

	public function __construct($login)
    {
        $this->user=$login;
    }


    public function ajoutFile($nom,$lien,$statut)
    {
    	 try
        {
            $ajoutFile ="INSERT INTO fichier(nom, lien, statut, id_user ) VALUES(?, ?, ?, (SELECT ID FROM user WHERE pseudo=?)) "; 
            $param=[array(1,$nom,PDO::PARAM_STR),array(2,$lien,PDO::PARAM_STR),array(3,$this->statut,PDO::PARAM_STR),array(4,$this->user,PDO::PARAM_STR)];
            $ajoutFile=$this->executerRequete($ajoutFile,$param);
        }
        catch(Exception $e)
        {
            echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
        }
    }

    public function getFile($id =null, $recherche =null, $lienUrl =null, $user =null)
    {
    	if($id!=null)//selection avec ID
    	{
    		$req="WHERE ID=? AND statut='public'";
    		$param=[array(1,$id,PDO::PARAM_INT)];
    	}
    	else if($recherche!=null)//selection suivant mot clé recherche
    	{
    		//à ajouter
    	}
    	else if($lienUrl!=null)//selection avec url (privé)
    	{
    		$req="WHERE lien_url=? ";
    		$param=[array(1,$lien_url,PDO::PARAM_STR)];
    	}
    	else if($user!=null)//selection file du user
    	{
    		$req="WHERE id_user=(SELECT ID FROM user WHERE pseudo=?)";
    		$param=[array(1,$this->user,PDO::PARAM_STR)];
    	}
    	else
    	{
    		$req='';
            $param=null;
    	}

    	try
          {
            $file = "SELECT ID, nom, lien_local, lien_url,date_ajout  FROM fichier ".$req."  ORDER BY date_ajout DESC";
            
            $files=$this->executerRequete($file,$param);
          }
          catch(Exception $e)
          {
              echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
          }
          $result=$files->fetchAll();

          return $result;  
    }





}