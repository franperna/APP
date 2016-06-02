<?php
	
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
	$req=$bdd->prepare('SELECT * FROM utilisateur where nom=?' );
	$req->execute(array(
					$_POST['nom']));
	$i = 3;		
	$nom=$_POST['nom'];
	$req=$bdd->query('UPDATE utilisateur SET privilege=\''.$i.'\' WHERE nom=\''.$nom.'\'');
	echo'utilisateur banni';
	
				

	?>