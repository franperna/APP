<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}



/*$dossier = 'upload/';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['avatar']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
	 
	
}*//*

 // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['logo']) AND $_FILES['logo']['error'] == 0) $erreur = "Erreur lors du transfert";
    {
        if ($_FILES['logo']['size'] <= 8000000) $erreur = "Le fichier est trop gros";
        {
            $infosfichier = pathinfo($_FILES['logo']['name']);
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                $extension_upload = strtolower(  substr(  strrchr($_FILES['logo']['name'], '.')  ,1)  );
                if (in_array($extension_upload, $extensions_autorisees)) echo "Extention correcte";
                {
                    $image_sizes = getimagesize($_FILES['logo']['tmp_name']);
                    if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";
                        {
                            $nom = "avatars/{$id}.{$extension_upload}";
                            move_uploaded_file($_FILES['logo']['tmp_name'], '../uploads/' . basename($_FILES['logo']['name']));
                            echo "L'envoi a bien été effectué !";
                             
                            $db = mysql_connect('localhost', 'root', 'root') or die('Erreur de connexion '.mysql_error());
                            // sélection de la base
                             
                            mysql_select_db('annuaire',$db) or die('Erreur de selection '.mysql_error());
                             
                            try
                            {
                                $bdd = new PDO('mysql:host=localhost;dbname=annuaire', 'root', 'root');
                            }
                            catch(Exception $e)
                            {
                                    die('Erreur : '.$e->getMessage());
                            }
                             
                             
                            $req = $bdd->prepare("INSERT INTO ficheID (id, nom, date, domaine, lieux, forme, mail, site, descriptif, logo) VALUES('', ?, ?, ?, ?, ?, ?, ?, ?, '$nom')");
                            $req->execute(array($_POST['nom'], $_POST['date'], $_POST['domaine'], $_POST['lieux'], $_POST['forme'], $_POST['mail'], $_POST['site'], $_POST['descriptif']));
                             
                            mysql_close(); // on ferme la connexion
 
                        }
                     
                }
         
        }
      
    }*/
 
     

// On ajoute une entrée dans la table test
//$bdd->exec('INSERT INTO utilisateur(nom, prenom, photo, mail, mot_de_passe, age, description, avertissement, civilité) VALUES(\'jean\', \'prenom\', \'photo\', \'mail@gmail.fr\', \'mot_de_passe\', \'1\', \'descriptio\', \'1\', \'mas\')');
// Ne pas  oublier de les mettre dans l'ordre

// Si toutes les variables nécessaires à la création de la date sont définies
// est que la date est valide (checkdate())
/*if(isset($_POST['annee']) && isset($_POST['mois']) && isset($_POST['jour'])
&& checkdate($_POST['mois'], $_POST['jour'], $_POST['annee'])) {
// création de la date au format date MySQL
$date = $_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];
// et ici tu mets ta requête d'insertion en utilisant la variable $date
}*/
$pass_hache = sha1($_POST['mot_de_passe']);

//if 

$age = $_POST['annee']."".$_POST['mois']."".$_POST['jour'];
echo $age;
$req = $bdd->prepare('INSERT INTO utilisateur (nom,prenom,mail,mot_de_passe,age,civilite,pseudo) VALUES(?,?,?,?,?,?,?)');
$req->execute(array(
	 $_POST['nom'],
	 $_POST['prenom'],
	 $_POST['mail'],
	 $pass_hache,
	 $age,
	 $_POST['civilite'],
	 $_POST['pseudo']
	));
header('Location: inscription.php');
?>
	