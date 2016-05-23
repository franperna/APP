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

$req = $bdd->prepare('INSERT INTO groupe (description,id_utilisateur,nomgroupe,id_sport,jour,journee,club,ville) VALUES(?,?,?,?,?,?,?,?)');
$req->execute(array(
      $_POST['description'],
      $_SESSION['id'],
	  $_POST['nomgroupe'],
	  $_POST['sport'],
	  $_POST['jour'],
	  $_POST['journee'],
	  $_POST['club'],
	  $_POST['ville']
	  ));
header('Location: creergroupe.php');


?>
	
