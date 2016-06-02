<!DOCTYPE html>
<html>

<head>
		<link rel="stylesheet" href="general.css"/>
		<meta charset ="utf-8"/>
		<title>Inscriptionadmin</title>
</head>


<form method ="post" >
<section>
<article>
       <legend>Inscriptionadmin</legend>
	   
<p>

<br/>
<br/>
<label for="firstname">Nom :</label>
<input type ="text" name="nom" id="nom" placeholder="Nom.." requered/>
<br/>
<br/>
<label for="lastname">Prenom :</label>
<input type ="text" name="prenom" id="prenom" placeholder="Prenom.."requered/>
<br/>

<br/>


<label for="pass">Mot de passe :</label>
<input type ="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe.." required/>
<br/>



<label for="email1">Email :</label>
<input type ="email" name="mail" id="email1" placeholder="Email.."requered//>
<br/>


<input type="submit" name= Envoyer value="Envoyer"/>

</p>

</form>
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
		$pass_hache = sha1($_POST['mot_de_passe']);
		$req = $bdd->prepare('INSERT INTO administrateur (nom,prenom,mail,mot_de_passe) VALUES(?,?,?,?)');
		$req->execute(array(
		$_POST['nom'],
		$_POST['prenom'],
		$_POST['mail'],
		$pass_hache,
		));
		}
?>
</article>
</section>

</body>
</html>


