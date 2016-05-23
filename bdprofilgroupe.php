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

$req = $bdd->prepare('INSERT INTO utilisateur_groupe(id_utilisateur,id_groupe) VALUES(?,?)');
$req->execute(array(
      $_SESSION['id'],
      $_GET['nom']
	  ));
header('Location: profilgroupe.php?nom='.$_GET['nom']);


?>
	