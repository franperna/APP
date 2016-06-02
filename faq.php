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
  <h3 style="text-align:center;">FAQ</h3>
</header>
</br>
</br>

<div id="form1">
<form method="post" >

<label for="question">question :</label>
<input type="text" name="question" id="question" />
</br>
<label for="reponse">reponse :</label> <P>

<TEXTAREA name="reponse" rows=10 COLS=40></TEXTAREA> <P>
<input type="submit" name="soumettre" value="soumettre"/>

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
  </div>
</body>
</html>