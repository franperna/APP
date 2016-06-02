<!DOCTYPE html>
<html>

<head>
		<link rel="stylesheet" href="Home.css"/>
		<meta charset ="utf-8"/>
		<title>Connexion</title>
</head>


<form method ="post" >


       <legend>Connexion</legend>
<p>

<label for="pseudo">nom:</label>
<input type ="text" name="nom" id="nom" placeholder="Pseudo.." required/>
<br/>

<label for="pass">Mot de passe :</label>
<input type ="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe.." required/>
<br/>

<input type="submit" name= Envoyer value="Envoyer"/>
</p>
<?php 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


 if(isset($_POST['Envoyer']))
    {
htmlentities($mot_de_passe = $_POST['mot_de_passe']);
htmlentities($nom = $_POST['nom']);
// Hachage du mot de passe
$pass_hache = sha1($_POST['mot_de_passe']);

// Vérification des identifiants
$req = $bdd->prepare('SELECT id,nom,prenom,mail,mot_de_passe,age,description,civilite FROM utilisateur WHERE nom = ? AND mot_de_passe = ?');
$req->execute(array(
     $nom,
     $pass_hache));
	
$resultat = $req->fetch();

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
	
}
else
{
    session_start();
    $_SESSION['id'] = $resultat['id'];
    
	$_SESSION['nom'] = $resultat['nom'];
	$_SESSION['prenom'] =$resultat['prenom'];
	$_SESSION['mot_de_passe'] = $resultat['mot_de_passe'];
	$_SESSION['mail'] = $resultat['mail'];
	$_SESSION['age']=$resultat['age'];
	$_SESSION['description']=$resultat['description'];
	$_SESSION['civilite']=$resultat['civilite'];
	//print_r($_SESSION);
	
    echo 'Vous êtes connecté !';
	header('Location: profil.php');
}
	}
/*<?php
if (isset(valider){
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
     header bd1;
}
	header
}
}*/
?>
