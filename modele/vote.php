<?php
require_once'modele/connexion_bdd.php';
class Vote extends connexion_bdd
{

	private $user;
	private $file_id;

	public function __construct($login,$id)
    {
        $this->user=$login;$this->file_id=$id;
    }
    public function supprimer()
    {
         try
        {
            $suppressionfile="DELETE FROM vote WHERE id_image=?";
            $param=[array(1,$this->file_id,PDO::PARAM_INT)];
            $supprimer=$this->executerRequete($suppressionfile,$param);
        }
        catch(Exception $e)
        {
            echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
        }
    }
    public function getNbVote($vote)
    {
    	 try
        {
        $nbVote ="SELECT COUNT(ID) FROM vote WHERE id_image=? AND vote=?";
          $param=[array(1,$this->file_id,PDO::PARAM_INT),array(2,$vote,PDO::PARAM_INT) ];
          $nbVote=$this->executerRequete($nbVote,$param);

        }
        catch(Exception $e)
        {
            echo " Erreur ! ".$e->getMessage(); die;
        }
        $result=$nbVote->fetchColumn();
       
        return $result;  
    }

    public function getAllVote()
    {
    	try
        {
        $isUserLike ="SELECT vote FROM vote WHERE id_user=(SELECT ID FROM user WHERE pseudo=?) ";
          $param=[array(1,$this->user,PDO::PARAM_STR) ];
          $isUserLike=$this->executerRequete($isUserLike,$param);

        }
        catch(Exception $e)
        {
            echo " Erreur ! ".$e->getMessage(); die;
        }
        $result=$isUserLike->fetch(PDO::FETCH_ASSOC);
          $resultLikeUser=$result['vote'];
          return $resultLikeUser;  
       
        return $result;  
    }
        public function getVote()
    {
        try
        {
        $isUserLike ="SELECT COUNT(vote) FROM vote WHERE id_user=(SELECT ID FROM user WHERE pseudo=?) AND id_image=?";
          $param=[array(1,$this->user,PDO::PARAM_STR),array(2,$this->file_id,PDO::PARAM_INT) ];
          $isUserLike=$this->executerRequete($isUserLike,$param);

        }
        catch(Exception $e)
        {
            echo " Erreur ! ".$e->getMessage(); die;
        }
        $result=$isUserLike->fetchColumn();
          
          return $result;  
       
       
    }
    public function setVote($vote)
    {
    	 try
        {
            $ajoutVote ="INSERT INTO vote(id_image, id_user,vote ) VALUES(?, (SELECT ID FROM user WHERE pseudo=?),?) "; 
            $param=[array(1,$this->file_id,PDO::PARAM_INT),array(2,$this->user,PDO::PARAM_STR),array(3,$vote,PDO::PARAM_INT)];
            $ajoutVote=$this->executerRequete($ajoutVote,$param);
        }
        catch(Exception $e)
        {
            echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
        }
    }
    public function updateVote($vote)
    {
         try
        {
            $ajoutVote ="UPDATE vote SET vote=? WHERE id_image=? AND id_user=(SELECT ID FROM user WHERE pseudo=?) "; 
            $param=[array(1,$vote,PDO::PARAM_INT), array(2,$this->file_id,PDO::PARAM_INT),array(3,$this->user,PDO::PARAM_STR),];
            $ajoutVote=$this->executerRequete($ajoutVote,$param);
        }
        catch(Exception $e)
        {
            echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
        }
    }
}