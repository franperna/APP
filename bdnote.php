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

$req = $bdd->prepare('UPDATE utilisateur_groupe SET note = ? WHERE id_utilisateur = ? AND id_groupe = ?');
$req->execute(array(
    $_POST['note'],
    $_SESSION['id'],
    $_GET['nom']
	  ));
header('Location: profilgroupe.php?nom='.$_GET['nom']);
?>