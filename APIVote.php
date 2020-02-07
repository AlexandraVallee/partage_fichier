<?php
//démarrez la session commme on ne passe pas par l'index
session_start();
require_once 'controleur/controleurVote.php';
//récupérer les données 
$vote=$_POST['vote'];
$id=$_POST['id'];
//créer un controleurvote et appeler la fonction vote
$ControleurVote=new ControleurVote();
$nbVote=$ControleurVote->vote($vote,$id);
//retourner le résultat au js
echo $nbVote;

