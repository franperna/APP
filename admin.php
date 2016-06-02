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
utilisateur :
<p> Un utilisateur banni a ses privilèges à 3<p>
<p> Si un utilisateur est leader d'un groupe alors  a ses privilèges à 3<p>
<form method="get" action="listeutilisateur.php" >

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
/*
D’ajouter, supprimer ou bannir des utilisateurs v
 D’ajouter, modifier ou supprimer des groupes 
 De modérer les commentaires et les messages du forum
 D’administrer la rubrique d’aide en ligne v

*/
$i = 3;

if (isset($_POST['Bannir']) && isset($_POST['mail'])) {
	htmlentities($mail1 = $_POST['mail']);
		$req2=$bdd->query('UPDATE utilisateur SET privilege=\''.$i.'\' WHERE mail=\''.$mail1.'\'');
		echo '\''.$i.'\'';
		echo'\''.$mail1.'\'';
		echo'utilisateur banni';
		$req2->closeCursor();
	}
	
	elseif (isset($_POST['supprimer'])&& isset($_POST['mail'])) {
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
		// $req3->closeCursor();
	}
	
$req=$bdd->query('SELECT nom,prenom,mail,privilege FROM utilisateur' );?>
</br>
</br>
<?php
echo'gestion des membres:';
while ($data = $req->fetch()) {?>
					<form method="post" >
					<table>
						<thead>
							<tr>
								<th>Nom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th>Prenom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th>Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
								<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;privilege&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> <?php echo $data['nom']; ?> </td>   
							
								<td>  <?php echo $data['prenom']; ?> </td>
								<td>  <?php echo $data['mail']; ?></td>
								<td>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['privilege']; ?></td>
								</br>
								<td><input type="submit" name= "Bannir" value="Bannir" /></td>
								<input type="hidden" name="mail" value="<?php echo $data['mail'];?>">
								<td><input type="submit" name= "supprimer" value="supprimer" /></td>
								<input type="hidden" name="mail" value="<?php echo $data['mail'];?>">
								
								<br>
							</tr>
						<tbody>
					</table>
					</form>
							
							
<?php
	
	
	
	
}	

/*if(isset ($_GET['trouver']) || isset($_POST['Bannir']) || isset($_POST['supprimer']))	{	
	$req=$bdd->prepare('SELECT * FROM utilisateur where nom=?' );
	$data=$req->execute(array(
					$_GET['nom']));
	
	$i = 3;		
	echo'<p> Gestion des Membres </p>';
	while ($data = $req->fetch()) {?>
					<form method="post" action="admin.php?nom=<?php echo $_GET['nom'] ?>"   >
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
		$req=$bdd->query('DELETE FROM utilisateur WHERE mail=\''.$data['mail'].'\'');
		
		echo'\''.$data['mail'].'\'';
		echo'utilisateur supprimé';
	}
	
}	
}*/

	//<input type="submit" name= "Bannir" value="Bannir" />
//print_r($_GET);
//print_r($_POST);
?>
</br>
</br>
<form method="post" >

<label for="question">question :</label>
<input type="text" name="question" id="question" />
</br>
<label for="reponse">reponse :</label> <P>

<TEXTAREA name="reponse" rows=10 COLS=40></TEXTAREA> <P>
<input type="submit" name="soumettre" value="soumettre"/>

</form>


<?php
if (isset($_POST['soumettre'])){
	htmlentities($reponse = $_POST['reponse']);
	htmlentities($question = $_POST['question']);
	
	if(!empty($reponse) && !empty($question)){


	$req2=$bdd->prepare('INSERT INTO faq (question,reponse)VALUES (?,?) ');
	$req2->execute(array(
	$question,
	$reponse
	));
	echo 'votre FAQ a été mise à jour ';
	}
	else{
		echo'veuillez remplir les champs avant de valider ';
	}


}

?>
<form method ="get">
<p> voir la FAQ</p>
<input type="submit" name="voir" value="voir"/>
 </form>
 <?php 
 if( isset ($_GET['voir']) || isset ($_POST['modifier'])){
	
	$req3=$bdd->query('SELECT * from faq');
	echo 'FAQ';
	$e=0;
		while ($donnee= $req3->fetch()){
		
					echo'<p><strong>'. htmlspecialchars($donnee['question']) . '</strong> :   </p>';             
					echo'<p><strong>'. htmlspecialchars($donnee['reponse']) . '</strong>    </p>'; 
									
		}?>
		<form method="post" action="faqmodif.php"   >
							
								
								<input type="submit" name= "modifier" value="modifier" />
								
								<br>
						
					</form>
<?php
	}
 ?>
 <form method ="get">
<p>la listes des groupes</p>
<input type="submit" name="liste" value="liste"/>
 </form>
 <?php 
 if( isset ($_GET['liste']) || isset ($_POST['modifier'])){
	
	$req3=$bdd->query('SELECT nomgroupe,club from groupe');
	echo 'groupe';
	$e=0;
		while ($donnee= $req3->fetch()){
		
					echo'<p><strong>'. htmlspecialchars($donnee['nomgroupe']) . '</strong> ,   <strong>'. htmlspecialchars($donnee['club']) . '</strong>    </p>';             
					
									
		}?>
		<form method="post" action="groupemodif.php"   >
							
								
								<input type="submit" name= "administrer" value="administrer" />
								
								<br>
						
					</form>
<?php
	}
 ?>
 
 </div>
</body>
</html>