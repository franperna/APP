<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="general.css"/>
		<meta charset ="utf-8"/>
		<title>profil</title>
</head>

<?php session_start();
?>

<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

	 
		
			$req = $bdd->prepare('SELECT photo FROM utilisateur WHERE mail = ? ');
			$req->execute(array(
			$_SESSION['mail']));
						//print_r ($req['id']);
						//var_dump $req;
						//die();
			$resul= $req->fetch();
			
			echo $resul['photo'];
    if (!empty($resul['photo'])){ ?>
      <img src="IMG/avatar/<?php echo $resul['photo'];?>" alt="avatar" width="150" />
    <?php
    } ?>
<p>nom:<?php if (isset($_SESSION['nom'])){echo htmlentities($_SESSION['nom']);} ?></p>
<br/>
<p>prenom:<?php if (isset($_SESSION['prenom'])){echo htmlentities($_SESSION['prenom']);} ?></p>
<br/>
<p>date de naissance:<?php if (isset($_SESSION['age'])){echo htmlentities($_SESSION['age']);} ?></p>
<br/>
<p>civilite:<?php if (isset($_SESSION['civilite'])){echo htmlentities($_SESSION['civilite']);} ?></p>
<br/>
<p>mail:<?php if (isset($_SESSION['mail'])){echo htmlentities($_SESSION['mail']);} ?></p>
<br/>
<p>description:<?php if (isset($_SESSION['description'])){echo htmlentities($_SESSION['description']);} ?></p>
<br/>

<a href = modification.php id ="modification">Modifier votre profil</a>







</html>
