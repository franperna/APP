<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="cssbackoffice.css">
  <title>BackOfficeAccueil</title>
</head>

<body>


<nav class="menu" style="width:18%;">
  <header class="container1">
    <br>
    <a href="logo1.php"><img class="imageconnexion" src="logo3.jpg" alt="" /></a>
    <div style="margin-left: 25%; text-align: right;">
      <br><br>
    <a class="boutton" href="admin.php">&nbsp;Accueil&nbsp;</a><br><br>
    <a class="boutton" href="sport.php">&nbsp;&nbsp;Sports&nbsp;&nbsp;</a><br><br>
    <a class="boutton" href="groupes.php">&nbsp;Groupes</a><br><br>
    <a class="boutton" href="forum.php">&nbsp;&nbsp;Forum&nbsp;&nbsp;</a><br><br>
    <a class="boutton" href="faq.php">&nbsp;&nbsp;FAQ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><br><br>
	
  </div>
</nav>


<div style="margin-left:18%">
<header class="container" style="background-color:rgb(128, 75, 144);color:white;width:95%;position:fixed;z-index: 3;">


  <h1 style="text-align:center;">Back-Office</h1>
  <h3 style="text-align:center;">Accueil</h3>
</header>


<div id="form1">
utilisateur :
<form method="get"  >

<label for="nom">Nom :</label>
<input type="text" name="nom" id="nom" />

<input type="submit" name=" trouver" value="trouver"/>

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
if(isset ($_GET['trouver']) || isset($_POST['Bannir']) || isset($_POST['supprimer']))	{	
	$req=$bdd->prepare('SELECT * FROM utilisateur where nom=?' );
	$data=$req->execute(array(
					$_GET['nom']));
	
	$i = 3;		
	echo'<p> Gestion des Membres </p>';
	while ($data = $req->fetch()) {?>
					<form method="post" action="listeutilisateur.php?nom=<?php echo $_GET['nom'] ?>"   >
					<table>
						<thead>
							<tr>
								<th>Nom</th>
								<th>Prenom</th>
								<th>Mail</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> <?php echo $data['nom']; ?> </td>   
							
								<td>  <?php echo $data['prenom']; ?> </td>
								<td>  <?php echo $data['mail']; ?></td>
								
								<td><input type="submit" name= "Bannir" value="Bannir" /></td>
								<td><input type="submit" name= "supprimer" value="supprimer" /></td>
								
								<br>
							</tr>
						<tbody>
					</table>
					</form>
							
							
<?php
	
	
	if (isset($_POST['Bannir'])) {
		$req=$bdd->query('UPDATE utilisateur SET privilege=\''.$i.'\' WHERE mail=\''.$data['mail'].'\'');
		echo '\''.$i.'\'';
		echo'\''.$data['mail'].'\'';
		echo'utilisateur banni';
		
	}
	elseif (isset($_POST['supprimer'])) {
	htmlentities($mail1 = $_POST['mail']);
		$req3=$bdd->query('SELECT id FROM utilisateur WHERE mail=\''.$mail1.'\'');
		$data1= $req3->fetch();
		echo $data1['id'] ;
		$req4=$bdd->query('SELECT id_utilisateur FROM groupe');
		while ($data2 = $req4->fetch()){
			
			if ($data1['id']==$data2['id_utilisateur']){
				
				$req5=$bdd->query('DELETE FROM groupe WHERE id_utilisateur=\''.$data2['id_utilisateur'].'\'');
			}else{
				echo 'ça marche pas';
			}
			
		}
		
		 $req3=$bdd->query('DELETE FROM utilisateur WHERE mail=\''.$mail1.'\'');
		
		echo'\''.$mail1.'\'';
		echo'utilisateur supprimé ';
	
	}
	
}	
}
?>
</div>
</body>
</html>
