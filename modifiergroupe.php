<?php
$req = $bdd->query('SELECT g.id AS id, u.id AS idd,g.id_utilisateur AS id_utilisateur FROM groupe g INNER JOIN utilisateur u ON g.id_utilisateur=u.id');
while ($donnees = $req->fetch())
{ 

if($_GET['nom']==$donnees['id'] && $donnees['id_utilisateur']==$_SESSION['id'])
{

echo '<a href=modificationgroupe.php?nom='.$_GET['nom'].'> Modifier mes paramètres </a> </br>'; 
echo'<a href=evenement.php?nom='.$_GET['nom'].'> Créer un évènement </a>';
echo '<form action="bdleader.php?nom='.$_GET['nom'].'" method="post">';
echo'<label> Désigner un autre leader: </label> 
            <input type="text" name="leader" id="leader" placeholder="" size="20" maxlength="50" />';

echo'<input type="submit" value="Valider" /> </br>';
echo'</form>';

echo '<form action="bdprofilgroupe3.php?nom='.$_GET['nom'].'" method="post">';
echo'<input type="submit" value="Supprimer le groupe" /> </br>';
echo'</form>';

echo '<form action="bdprofilgroupe4.php?nom='.$_GET['nom'].'" method="post">';
echo'<label> Supprimer un membre du groupe: </label> 
            <input type="text" name="membre" id="membre" placeholder="" size="20" maxlength="50" />';

echo'<input type="submit" value="Valider" /> </br>';
echo'</form>';
}

} // Fin de la boucle des billets
$req->closeCursor();
?>

<?php
session_start();
try
{
$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare('DELETE FROM utilisateur_groupe WHERE id_groupe=?');
$req->execute(array(
$_GET['nom']
));
$req->closeCursor();
$req = $bdd->prepare('UPDATE groupe SET id_utilisateur=NULL,id_sport=NULL WHERE id=?');
$req->execute(array(
$_GET['nom']
));
$req->closeCursor();
$req = $bdd->prepare('DELETE FROM evenement WHERE id_groupe=?');
$req->execute(array(
$_GET['nom']
));
$req->closeCursor();
$req = $bdd->prepare('DELETE FROM groupe WHERE id=?');
$req->execute(array(
$_GET['nom']
));
$req->closeCursor();
header('Location: Group.php');










