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
  <h3 style="text-align:center;">ACCUEIL</h3>
</header>


<div id="form1">
<?php
try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', '');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
	
if (isset($_POST['supprimer']) && isset($_POST['rubrique'] )) {
	
	htmlentities($idrubrique = $_POST['rubrique']);
		$req2=$bdd->query('DELETE FROM rubrique WHERE id=\''.$idrubrique.'\'');
		$req3=$bdd->query('DELETE FROM abus WHERE id_rubrique=\''.$idrubrique.'\'');
		echo '\''.$idrubrique.'\'';
		
		echo'rubrique supprimer';
		$req2->closeCursor();
	}

	
	$req=$bdd->query('SELECT a.id_rubrique AS abus_rubrique, r.titre AS titrerubrique , r.description AS descriptionrubrique 
					FROM abus a
					INNER JOIN rubrique r
					ON r.id=a.id_rubrique');
	
		while ($donnee = $req->fetch()){?>
		<form method="post" >
		<table>
			<thead>
							<tr>
								<th>Rubrique</th>
								<th>Titre</th>
								<th>Description</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>   
								<td>  <?php echo $donnee['abus_rubrique'];?> </td>
								<td>  <?php echo $donnee['titrerubrique']; ?> </td>
								<td> <?php echo $donnee['descriptionrubrique']; ?></td>
								<td><input type="submit" name= supprimer value="supprimer" /></td>
								<input type="hidden" name="rubrique" value="<?php echo $donnee['abus_rubrique'];?>">
								<br>
							</tr>
						<tbody>
					</table>
				
		</form>	
	<?php	}
	if (isset($_POST['supprimer2']) && isset($_POST['message'] )) {
	
	htmlentities($idmessage = $_POST['message']);
		$req2=$bdd->query('DELETE FROM message WHERE id=\''.$idmessage.'\'');
		$req3=$bdd->query('DELETE FROM abus WHERE id_message=\''.$idmessage.'\'');
			echo '\''.$idmessage.'\'';
		
		echo'message supprimer';
	
	 $req2->closeCursor();
	}
		$req1=$bdd->query('SELECT m.texte AS textemessage , a.id_message AS abus_message
					FROM abus a
					INNER JOIN message m
					ON m.id=a.id_message');
		while ($donnee1 = $req1->fetch()){?>
		<form method="post" >
			<table>
			<thead>
							<tr>
								
								<th>Message</th>
								<th>Description</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								 
							
								<td> </td>
								<td> <?php echo $donnee1['textemessage']; ?></td>
								<td><input type="submit" name= "supprimer2" value="supprimer" /></td>
								<input type="hidden" name="message" value="<?php echo $donnee1['abus_message'];?>">

								<br>
							</tr>
						<tbody>
					</table>
				</form>
		<?php
		}
		?>
 </div>
</body>
</html>