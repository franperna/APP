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
</br>
</br>

<div id="form1">
<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', '');
}
catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
}
echo 'FAQ';
if (isset($_POST['soumettre'])){
	print_r($_POST);
	htmlentities($question2 = $_POST['question']);
	htmlentities($reponse2 = $_POST['reponse']);
	if(isset($_POST['reponse']) && isset($_POST['question']) && isset($_POST['id']) ){
		$req2=$bdd->prepare('UPDATE faq SET question=:question,reponse=:reponse WHERE id=:id ');
		//$req2->bindValue(':id', $idbis[$e], PDO::PARAM_STR);
		$req2->execute(array(
			'question' => $question2,
			'reponse'=> $reponse2,
			'id' => $_POST['id']
		));
		echo 'votre FAQ  a été mise à jour ';
	}
	else{
		echo'veuillez remplir les champs avant de valider ';
	}
}		

$req3=$bdd->query('SELECT * from faq');
while ($donnee= $req3->fetch()){
					
					echo'<p><strong>'. htmlspecialchars($question=$donnee['question']) . '</strong> :   </p>';             
					echo'<p><strong>'. htmlspecialchars($reponse=$donnee['reponse']) . '</strong>    </p>'; 
		?>				
		<form method="post" >

					<label for="question">question :</label>
					<input type="text" name="question" id="question" value="<?php echo $question;?>" />
					</br>
					<label for="reponse">reponse :</label> <P>
					<input type="hidden" name="id" value="<?php echo $donnee['id'];?>">
					<TEXTAREA name="reponse" rows=10 COLS=40 ><?php echo $reponse;?></TEXTAREA> 
					<input type="submit" name="soumettre" value="soumettre"/>

				</form>	
		<?php
			
		

}
			
?>		
 </div>
</body>
</html>		