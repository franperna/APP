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
  <h3 style="text-align:center;">GROUPE</h3>
</header>


<div id="form1">
<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', '');
}
catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
}
echo 'Modifier un groupe';
		
if (isset($_POST['supprimer'])){
	var_dump($_POST);
	
	$id=$_POST['id'];
	
		echo'\''.$id .'\'';
		$req2=$bdd->prepare('DELETE FROM groupe WHERE id=?');
		//$req2->bindValue(':id', $idbis[$e], PDO::PARAM_STR);
		$req2->execute(array(
		$id
		));
		
		echo'\''.$nomgroupe .'\'';
	
}

$req3=$bdd->query('SELECT nomgroupe,club,id from groupe');
while ($donnee= $req3->fetch()){
					
					
					echo'<p><strong>'. htmlspecialchars($nomgroupe=$donnee['nomgroupe']) . '</strong> :   </p>';             
					echo'<p><strong>'. htmlspecialchars($club=$donnee['club']) . '</strong>    </p>'; 
		?>				
		<form method="post" >

					<input type="hidden" name="id" value="<?php echo $donnee['id'];?>">
					 
					<input type="submit" name="supprimer" value="supprimer"/>

				</form>	
		<?php
		
	
}			


			
?>	
</div>
</body>
</html>			