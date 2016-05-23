<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="general.css"/>
		<meta charset ="utf-8"/>
		<title>deconnexion</title>
</head>
<?php

session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Suppression des cookies de connexion automatique
setcookie('login', '');
setcookie('pass_hache', '');
header('Location: Home.php')

?>
<form action="deconnexion.php" method ="post" >
<input type="submit" value="deconnexion"/>
</html>
