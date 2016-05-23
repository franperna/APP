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

$req = $bdd->prepare('DELETE FROM utilisateur_groupe WHERE id_utilisateur=? AND id_groupe=?');
$req->execute(array(
	$_SESSION['id'],
	$_GET['nom']
	));

header('Location: profilgroupe.php?nom='.$_GET['nom']);


?>
	