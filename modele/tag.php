<?php
require_once'modele/connexion_bdd.php';
class Tag extends connexion_bdd
{

	private $id_image;
	private $tag;

	public function __construct($id_image,$tag)
    {
        $this->id_image=$id_image;
        $this->tag=$tag;
    }
    public function getTag()
    {
    	try
          {
            $tags = "SELECT COUNT(nom) FROM tag WHERE nom=? ";
             $param=[array(1,$this->tag,PDO::PARAM_STR)];
            $tags=$this->executerRequete($tags,$param);
          }
          catch(Exception $e)
          {
              echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
          }
          $result=$tags->fetchColumn();
          
          return $result;  
    }
    public function getAllTags()
    {
    	try
          {
            $tags = "SELECT nom FROM tag ORDER BY nom ";
            $tags=$this->executerRequete($tags);
          }
          catch(Exception $e)
          {
              echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
          }
          $result=$tags->fetchAll();
          
          return $result;  
    }
    public function ajoutTag()
    {
    	 try
        {
            $ajoutTag ="INSERT INTO tag(nom ) VALUES(?) "; 
            $param=[array(1,$this->tag,PDO::PARAM_STR)];
            $ajoutTag=$this->executerRequete($ajoutTag,$param);
        }
        catch(Exception $e)
        {
            echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
        }
    }

    public function ajoutTagImage()
    {
    	 try
        {
            $ajoutTag ="INSERT INTO tag_fichier(id_fichier,id_tag ) VALUES(?, (SELECT ID FROM tag WHERE nom=?)) "; 
            $param=[array(1,$this->id_image,PDO::PARAM_INT),array(2,$this->tag,PDO::PARAM_STR)];
            $ajoutTag=$this->executerRequete($ajoutTag,$param);
        }
        catch(Exception $e)
        {
            echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
        }
    }
    public function getTagImage()
    {
    try
          {
            $tags = "SELECT nom FROM tag  INNER JOIN tag_fichier AS tag_fichier ON tag_fichier.id_tag=tag.ID WHERE ?=tag_fichier.id_fichier ";
            $param=[array(1,$this->id_image,PDO::PARAM_INT)];
            $tags=$this->executerRequete($tags,$param);
          }
          catch(Exception $e)
          {
              echo " Erreur ! ".$e->getMessage(); print_r($datas); die;
          }
          $result=$tags->fetchAll();
          
          return $result;  
        }
}