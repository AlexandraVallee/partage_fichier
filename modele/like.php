<?php
require_once'modele/connexion_bdd.php';
class Like extends connexion_bdd
{

	private $user;
	private $file_id;

	public function __construct($login,$id)
    {
        $this->user=$login;$this->file_id=$id;
    }

    public function getNbLike()
    {
    	 try
        {
        $nbLike ="SELECT COUNT(ID) FROM likefile WHERE id_image=? ";
          $param=[array(1,$this->file_id,PDO::PARAM_INT) ]; 
          $nbLike=$this->executerRequete($nbLike,$param);

        }
        catch(Exception $e)
        {
            echo " Erreur ! ".$e->getMessage(); die;
        }
        $result=$nbLike->fetchColumn();
       
        return $result;  
    }

    public function getLike()
    {
    	try
        {
        $isUserLike ="SELECT COUNT() FROM likefile WHERE id_user=(SELECT ID FROM user WHERE pseudo=?) ";
          $param=[array(1,$this->user,PDO::PARAM_STR) ];
          $isUserLike=$this->executerRequete($isUserLike,$param);

        }
        catch(Exception $e)
        {
            echo " Erreur ! ".$e->getMessage(); die;
        }
        $result=$isUserLike->fetchColumn();
       
        return $result;  
    }
    public function setLike()
    {
    	 try
        {
            $ajoutLike ="INSERT INTO likefile(id_image, id_user ) VALUES(?, (SELECT ID FROM user WHERE pseudo=?)) "; 
            $param=[array(1,$file_id,PDO::PARAM_INT),array(2,$this->user,PDO::PARAM_STR)];
            $ajoutLike=$this->executerRequete($ajoutLike,$param);
        }
        catch(Exception $e)
        {
            echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
        }
    }
}