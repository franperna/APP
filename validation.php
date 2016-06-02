

<?php
session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
if (isset($_SESSION['id']){
	header('Location: .php');
}
else{
	header('Location:inscription2.php')
}

?>
