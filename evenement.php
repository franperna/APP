 <!DOCTYPE html>
 <?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
session_start();
?>

<html>

<head>
		<link rel="stylesheet" href="general.css"/>
		<meta charset ="utf-8"/>
		<title>evenement</title>
</head>
<body>
 <form method="post" action="<?php echo 'bdevenement.php?nom='.$_GET['nom']?>">
 <p>
                     Choissisez une date:
                 </p>
                      <input  name="date" type="date" id="date" placeholder="aaaa-mm-jj"></code>
   <p>
   <label for="description"> Description :</label><br/>
<textarea name="description" id="description"></textarea>
   </p>
   <p>
   Choissisez un titre:
   <input type="text" name="titre" id="titre" placeholder="" size="20" maxlength="50" />
   </p>
   </br>
					 <input type="submit" value="valider"/>
   
</form>
</body>
</html>