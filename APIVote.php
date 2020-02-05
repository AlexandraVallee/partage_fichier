<?php
session_start();
require_once 'controleur/controleurVote.php';
require_once 'controleur/controleurUser.php';   
$vote=$_POST['vote'];
$id=$_POST['id'];

$ControleurVote=new ControleurVote();
$nbVote=$ControleurVote->vote($vote,$id);
echo $nbVote;

