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
		<title>profilgroupe</title>
</head>
<body>
<?php
$req = $bdd->query('SELECT g.ville AS ville,g.photo AS photo,g.id_sport AS id_sport,g.id AS id, u.id AS idd, s.id AS iddd,g.nomgroupe AS nomgroupe, g.jour AS jour, g.journee AS journee, g.club AS club,g.description AS description,g.id_utilisateur AS id_utilisateur,g.id_sport AS id_sport , u.nom AS nomutilisateur, s.type AS sport FROM groupe g INNER JOIN utilisateur u ON g.id_utilisateur=u.id INNER JOIN sport s ON g.id_sport=s.id');
while ($donnees = $req->fetch())
{ 

if($_GET['nom']==$donnees['id'] && $donnees['id_utilisateur']==$donnees['idd'] && $donnees['id_sport']==$donnees['iddd'])
{
echo '<h2> Nom du groupe:'.htmlspecialchars($donnees['nomgroupe']).'</h2>';
echo '<h2> Leader:'.htmlspecialchars($donnees['nomutilisateur']).'</h2>';
echo '<h2> Sport:'.htmlspecialchars($donnees['sport']).'</h2>';
echo '<h2> Jour:'.htmlspecialchars($donnees['jour']).'</h2>';
echo '<h2> Journée:'.htmlspecialchars($donnees['journee']).'</h2>';
echo '<h2> Ville:'.htmlspecialchars($donnees['ville']).'</h2>';
echo '<h2> Club:'.htmlspecialchars($donnees['club']).'</h2>';
echo '<h2> Description:'.htmlspecialchars($donnees['description']).'</h2>';
echo '<h2> Photo:<img id="photogroupe" src="IMG/groupe/'.htmlspecialchars($donnees['photo']).'" alt="Photo de sport" title="Le site du sport"/></h2>';

$_SESSION['nomgroupe']=$donnees['nomgroupe'];
$_SESSION['nomutilisateur']=$donnees['nomutilisateur'];
$_SESSION['sport']=$donnees['id_sport'];
$_SESSION['jour']=$donnees['jour'];
$_SESSION['journee']=$donnees['journee'];
$_SESSION['villeg']=$donnees['ville'];
$_SESSION['club']=$donnees['club'];
$_SESSION['descriptiong']=$donnees['description'];
$_SESSION['photog']=$donnees['photo'];
}

              
} // Fin de la boucle des billets
$req->closeCursor();
echo'<h1> Evenement </h1>';
$req = $bdd->query('SELECT id,id_groupe,date,description,titre FROM evenement e  ORDER BY id DESC');
while ($donnees = $req->fetch())
{ 

if ($donnees['id_groupe']==$_GET['nom'])
{

echo '<h2> Titre:'.htmlspecialchars($donnees['titre']).'</h2>';
echo '<h2> Date:'.htmlspecialchars($donnees['date']).'</h2>';
echo '<h2> Description:'.htmlspecialchars($donnees['description']).'</h2>';
} 
}// Fin de la boucle des billets
$req->closeCursor();
?>

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
}

} // Fin de la boucle des billets
$req->closeCursor();
?>
<?php
$req = $bdd->query('SELECT id_utilisateur,id_groupe FROM utilisateur_groupe');
$ab=0;
while ($donnees = $req->fetch())
{ 

if($donnees['id_utilisateur']==$_SESSION['id'] && $_GET['nom']==$donnees['id_groupe'])
{
 echo 'Vous appartenez à ce groupe </br>'; 
 $ab=$ab+1;
 echo '<form action="bdprofilgroupe2.php?nom='.$_GET['nom'].'" method="post">';
 echo'<input type="submit" value="Se désinscrire du groupe" /> </br>';
 echo'</form>';
}

}
$req->closeCursor();

if($ab!=1){
echo '<form action="bdprofilgroupe.php?nom='.$_GET['nom'].'" method="post">';
echo'<input type="submit" value="S\'inscrire au groupe" /> </br>';
echo'</form>';
}

$req = $bdd->query('SELECT ug.id_utilisateur AS id_utilisateur ,ug.id_groupe AS id_groupe,u.id AS id,u.pseudo AS pseudo FROM utilisateur_groupe ug INNER JOIN utilisateur u ON ug.id_utilisateur=u.id');
echo'Liste des personnes présente dans ce groupe:';
while ($donnees = $req->fetch())
{
if($_GET['nom']==$donnees['id_groupe'])
{ echo $donnees['pseudo'];
   echo '&nbsp';}}
$req->closeCursor();

$req = $bdd->query('SELECT id_utilisateur,id_groupe,note FROM utilisateur_groupe');
$ba=0;
while ($donnees = $req->fetch())
{ 

if($donnees['id_utilisateur']==$_SESSION['id'] && $_GET['nom']==$donnees['id_groupe'] && $donnees['note']!=NULL)
{
echo 'Vous avez déjà noté ce groupe </br>'; 
$ba=$ba+1;
}}
$req->closeCursor();
if($ba!=1){
echo '<form action="bdnote.php?nom='.$_GET['nom'].'" method="post">';
echo'   <p>
       <label for="note">Choissisez une note pour ce groupe:</br> Ps: Cette note sera prise en compte que si vous êtes inscrit à ce groupe</label><br />
       <select name="note" id="note">
               <option name="note" value=1>1</option>
               <option name="note" value=2>2</option>
               <option name="note" value=3>3</option>
               <option name="note" value=4>4</option>
               <option name="note" value=5>5</option>
     </select>
   </p>';
echo'<input type="submit" value="Envoyer" /> </br>';
echo'</form>';}

$req = $bdd->query('SELECT id_groupe,AVG(note)AS noteg FROM utilisateur_groupe WHERE id_groupe='.$_GET['nom'].'');
while ($donnees = $req->fetch())
{
echo'Note générale du groupe :'.$donnees['noteg'].'/5';	
}
$req->closeCursor();
?>
<a href="Group.php">Retournez au choix d'un groupe</a>


</body>
</html>