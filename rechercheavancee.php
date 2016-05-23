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

$req = $bdd->query('SELECT nomgroupe,id,jour,id_sport,ville FROM groupe ');
$cc=0;
while ($donnees = $req->fetch())
{ 

if($_POST['jour']==$donnees['jour'] && $_POST['sport']==$donnees['id_sport'] && $_POST['ville']==$donnees['ville'])
{

echo 'Voici les groupes de sport correspondant à votre recherche: </br> Pour voir leur profil cliquer sur le lien.'; 
echo'<a href="profilgroupe.php?nom='.$donnees['id'].'">'.$donnees['nomgroupe'].'</a>';
$cc=$cc+1;
}
} 
$req->closeCursor();// Fin de la boucle des billets
if($cc==0){
echo 'Aucun groupe de sport correspond à votre recherche. </br> Nous vous invitons à en créer un : &nbsp;'; 
echo'<a href="creergroupe.php">Créer un groupe </a>';	

}

?>