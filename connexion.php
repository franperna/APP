<!DOCTYPE html>
<html>

<head>
		<link rel="stylesheet" href="inscription.css"/>
		<meta charset ="utf-8"/>
		<title>Connexion</title>
</head>
<body>
        <div id="bloc_page">
             <header>
                 
                    <img id="logo" src="Images site web/le_site_du_sport2.jpg" alt="Photo de sport" title="Le site du sport"/> 

                  


                     <h1> Le site du sport </h1>
                     
                 <nav>
                     <a href="Home.php"id="Home">Accueil</a> 
                     <a href="Directory.php" id="Directory">Répertoire</a>
                     <a href="Group.php"id="Group">Groupe</a>  
                     <a href="Forums.php"id="Forums">Forum</a> 
                     <a href="Help.php" id="Help">Aide</a> 
                 </nav>
             </header>
<section>
<img id="life" src="Images site web/Fond/Fond8.jpg" alt="Photo de sport" title="Sport is life"/>
<form method ="post" >
<article>

<div id="news">

       <legend>Connexion</legend>
<p>

<label for="pseudo">Pseudo :</label>
<input type ="text" name="pseudo" id="pseudo" placeholder="Pseudo.." required/>
<br/>

<label for="pass">Mot de passe :</label>
<input type ="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe.." required/>
<br/>

<input type="submit" value="Envoyer"/>
</p>
<?php 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
// Hachage du mot de passe
$pass_hache = sha1($_POST['mot_de_passe']);

// Vérification des identifiants
$req = $bdd->prepare('SELECT id, pseudo FROM utilisateur WHERE pseudo = ? AND mot_de_passe = ?');
$req->execute(array(
     $_POST['pseudo'],
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
    $_SESSION['pseudo'] = $resultat['pseudo'];
	//print_r($_SESSION);
	
    echo 'Vous êtes connecté !';
	header('Location: profil.php');
}

/*<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
}*/
?>
</div>
</article>
</section>
<footer>
                     <a href="Francais.html"> <img id="france" src="Images site web/drapeauF.gif" alt="Drapeau de la France" title="Français"/> </a>
                     <a href="Américain.html"> <img id="amerique" src="Images site web/flagus.mini.mini.mini.gif" alt="Drapeau des Etats Unis" title="Anglais"/> </a>
             </footer>
        </div>
    </body>