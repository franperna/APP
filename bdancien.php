<?php

/* // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0) $erreur = "Erreur lors du transfert";
    {
        if ($_FILES['photo']['size'] <= 8000000) $erreur = "Le fichier est trop gros";
        {
            $infosfichier = pathinfo($_FILES['photo']['name']);
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                $extension_upload = strtolower(  substr(  strrchr($_FILES['photo']['name'], '.')  ,1)  );
                if (in_array($extension_upload, $extensions_autorisees)) echo "Extention correcte";
                {
                    $image_sizes = getimagesize($_FILES['photo']['tmp_name']);
                    if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";
                   {
                            $nom = "avatars/{$id}.{$extension_upload}";
                            move_uploaded_file($_FILES['logo']['tmp_name'], '../uploads/' . basename($_FILES['logo']['name']));
                            echo "L'envoi a bien été effectué !";
                             
                            $db = mysql_connect('localhost', 'root', 'root') or die('Erreur de connexion '.mysql_error());
                            // sélection de la base
                             
                            mysql_select_db('annuaire',$db) or die('Erreur de selection '.mysql_error());
                                  
                     
                }
         
        }
      
    } */ try
{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

// On ajoute une entrée dans la table jeux_video
$age= $_POST['day']." ".$_POST['month']." ".$_POST['year'];

$req = $bdd->prepare('INSERT INTO utilisateur (nom,prenom,mail,mot_de_passe,age,description,civilite,pseudo) VALUES(?,?,?,?,?,?,?,?)');
$req->execute(array(
	 $_POST['nom'],
	 $_POST['prenom'],
	 $_POST['mail'],
	 $_POST['mot_de_passe'],
     $age,
	 $_POST['description'],
	 $_POST['civilite'],
	 $_POST['pseudo']
	));

header('Location: inscription.php');

 /* 
 http://antoine-herault.developpez.com/tutoriels/php/upload/ */
?>

