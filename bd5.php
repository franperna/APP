<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=entretien;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('INSERT INTO abonné(abonné,désabonné,mois,abonnéf) VALUES(?,?,?,?)');
$req->execute(array(
	 $_POST['abonné'],
	 $_POST['désabonné'],
	 $_POST['mois'],
	 $_POST['abonnéf']
	));
?>