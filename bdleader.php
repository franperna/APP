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
htmlentities($leader = $_POST['leader']);
$req = $bdd->query('SELECT id,pseudo FROM utilisateur WHERE pseudo= \''.$leader.'\'  ');
while ($donnees = $req->fetch())
{ 
$aa=htmlspecialchars($donnees['id']);
}
$req->closeCursor();
$req = $bdd->prepare('UPDATE groupe SET id_utilisateur=? WHERE id_utilisateur=? AND id=?');
$req->execute(array(
	$aa,
	$_SESSION['id'],
	$_GET['nom']
	));
$req->closeCursor();
header('Location: profilgroupe.php?nom='.$_GET['nom']);



?>