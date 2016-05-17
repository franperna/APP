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
$req = $bdd->prepare('INSERT INTO message(texte, date, id_utilisateur,id_rubrique) VALUES(?, NOW(),?,?)');
$req->execute(array($_POST['texte'],$_SESSION['id'], $_GET['rubrique']));

// Redirection du visiteur vers la page rubrique
header('Location: message.php?sujet='.$_GET['sujet'].'&rubrique='.$_GET['rubrique']);
?>
