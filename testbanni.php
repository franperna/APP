<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
session_start();

$req = $bdd->prepare('SELECT privilege FROM utilisateur WHERE mail = ? ');
$req->execute(array(
$_SESSION['mail']));

$resul= $req->fetch();

if (($resul['privilege'])!=3){
	
	header('Location: testinscription.php');
	
}

else{
	
	header('Location:accueil.php')
}

?>