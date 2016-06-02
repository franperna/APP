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
  <h3 style="text-align:center;">SPORT</h3>
</header>
</br>
</br>

<div id="form1">

<form method="post" >

					<label for="sport">Sport:</label>
					<input type="text" name="type" id="type" />
					</br>
					<br/>
					<label for="photo">Photo :</label>
					<input type="file" name="avatar"/>
					<input type="hidden" name="MAX_FILE_SIZE" value="100000">
					
					
					<input type="submit" name="ajouter" value="ajouter"/>

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
if(isset($_POST['ajouter'])){
	if(isset($_POST['type'])){
		htmlentities($type = $_POST['type']);

	$req2=$bdd->prepare('INSERT INTO sport (type) VALUES (?) ');
	$req2->execute(array(
	$type
	));
	echo ''.$type.' a été rejouté';
	
	}
	$req = $bdd->prepare('SELECT id FROM sport WHERE type= ? ');
						$req->execute(array(
						$_POST['type']));
						//print_r ($req['id']);
						//var_dump $req;
						//die();
						$resul= $req->fetch();
	if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
					$taillemax=2097152;
						$extensionsvalides=array('jpg','jpeg','gif','png');
					if($_FILES['avatar']['size'] <= $taillemax){
					$extensionupload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1)); // check si tout minuscule et l'extension
						if(in_array($extensionupload, $extensionsvalides)){
							$chemin = "IMG/sport/".$resul['id'].".".$extensionupload;
							$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin); //stockage temporaire
							if($resultat){
								$req = $bdd->prepare('UPDATE sport SET photo = :avatar WHERE id = :idutilisateur');
								$req-> execute(array(
								'avatar' => $resul['id'].".".$extensionupload,
								'idutilisateur' => $resul['id']
								));
           
							}
								else{
									$msg = "Erreur lors de l'importation de la photo de profil...";
								}
							}
								else{
									$msg = "Votre photo de profil doit être au format indiqué !";
								}
					}
						else{
							$msg = "Votre photo de profil ne doit pas dépasser 2 Mo !";
						}					
					}
}
?>	
<p> Changer la photo du sport </p>
<form method="post" >

					<select id="selectbox" name="sport" ">
							<option value="#"> </option>
							<?php
								$req = $bdd->query('SELECT id,type FROM sport ORDER BY id');
								while ($donnees = $req->fetch())
								{
							?>
									<option name="sport" value="<?php echo htmlspecialchars($donnees['id']); ?>" method="post"><?php echo htmlspecialchars($donnees['type']); ?> </option>
									<?php
								} // Fin de la boucle des billets
							$req->closeCursor();
							?>
							</select>
							
					<br/>
					<label for="photo">Photo :</label>
					<input type="file" name="avatar"/>
					<input type="hidden" name="MAX_FILE_SIZE" value="100000">
					
					
					<input type="submit" name="modifier" value="modifier"/>

</form>
<?php
// if
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
					$taillemax=2097152;
						$extensionsvalides=array('jpg','jpeg','gif','png');
					if($_FILES['avatar']['size'] <= $taillemax){
					$extensionupload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1)); // check si tout minuscule et l'extension
						if(in_array($extensionupload, $extensionsvalides)){
							$chemin = "IMG/sport/".$resul['id'].".".$extensionupload;
							$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin); //stockage temporaire
							if($resultat){
								$req = $bdd->prepare('UPDATE sport SET photo = :avatar WHERE id = :idutilisateur');
								$req-> execute(array(
								'avatar' => $resul['id'].".".$extensionupload,
								'idutilisateur' => $resul['id']
								));
           
							}
								else{
									$msg = "Erreur lors de l'importation de la photo de profil...";
								}
							}
								else{
									$msg = "Votre photo de profil doit être au format indiqué !";
								}
					}
						else{
							$msg = "Votre photo de profil ne doit pas dépasser 2 Mo !";
						}					
					}

?>
</div>
</body>
</html>