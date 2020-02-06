<?php

abstract class connexion_bdd {

    const host = 'localhost';
    const dbname='chouquette';
    const login = 'root';
    const mdp ='';
    private static $bdd;

    protected function executerRequete($sql, $params = null) 
    {
        if ($params == null) 
        {
            $resultat = self::getBdd()->query($sql);   // exécution directe
        }
        else 
        {
            $resultat = self::getBdd()->prepare($sql); // requête préparée
            for( $i=0; $i<count($params);$i++)
            {  
                $resultat->bindValue($params[$i][0],$params[$i][1],$params[$i][2]);
            }
            $resultat->execute();
        }
        return $resultat;
    }
        protected function executerRequeteInsertRecupId($sql, $params = null) 
    {
        if ($params == null) 
        {
            $resultat = self::getBdd()->query($sql);   // exécution directe
        }
        else 
        {
            $resultat = self::getBdd()->prepare($sql); // requête préparée
            for( $i=0; $i<count($params);$i++)
            {  
                $resultat->bindValue($params[$i][0],$params[$i][1],$params[$i][2]);
            }
            $resultat->execute();
            $resultId=self::getBdd()->lastInsertId();
        }
        return $resultId;
    }

    private static function getBdd() 
    {
        if (self::$bdd === null) 
        {
            // Création de la connexion
            self::$bdd = new PDO('mysql:host='.self::host.'; dbname='.self::dbname.'', self::login, self::mdp, 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }
}