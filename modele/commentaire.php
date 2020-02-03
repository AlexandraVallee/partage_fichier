<?php
require_once'modele/connexion_bdd.php';
class Commentaire extends connexion_bdd
{
	private $user;
	private $id_file;

	public function __construct($login, $id_file)
	{
		$this->user=$login;$this->id_file=$id_file;
	}

	public function getCommentaires()
	{
		try
          {
            $commentaires = "SELECT contenu,date_ajout FROM commentaire WHERE id_image=? ORDER BY date_ajout DESC";
            $param=[array(1,$id_file,PDO::PARAM_INT)];
            $listCommentaires=$this->executerRequete($commentaire,$param);
          }
          catch(Exception $e)
          {
              echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
          }
          $result=$listCommentaires->fetch(PDO::FETCH_ASSOC);
          $resultCommentaire=[$result['contenu'],$result['date_ajout']];
          return $resultCommentaire;  
	}

	public function setCommentaire($contenu,$date_ajout)
	{
		 try
        {
            $ajoutCommentaire ="INSERT INTO commentaire(contenu, date_ajout,id_image, id_user ) VALUES(?, ?, ?, (SELECT ID FROM user WHERE pseudo=?)) "; 
            $param=[array(1,$contenu,PDO::PARAM_STR),array(2,$date_ajout,PDO::PARAM_STR),array(3,$this->id_file,PDO::PARAM_INT),array(4,$this->user,PDO::PARAM_STR)];
            $ajoutCommentaire=$this->executerRequete($ajoutCommentaire,$param);
        }
        catch(Exception $e)
        {
            echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
        }
	}
}