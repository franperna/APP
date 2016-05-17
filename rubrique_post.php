<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
session_start();

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO rubrique(titre, description,id_sujet,id_utilisateur) VALUES(?, ?, ?, ?)');
$req->execute(array($_POST['titre'], $_POST['description'], $_GET['sujet'], $_SESSION['id']));

// Redirection du visiteur vers la page rubrique
header('Location: rubrique.php?sujet='.$_GET['sujet']);
?>