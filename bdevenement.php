<?php
session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('INSERT INTO evenement (date,description,titre,id_groupe) VALUES(?,?,?,?)');
$req->execute(array(
	  $_POST['date'],
      $_POST['description'],
      $_POST['titre'],
	  $_GET['nom']
	  ));
header('Location: evenement.php?nom='.$_GET['nom']);


?>