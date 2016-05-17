<!DOCTYPE html>
<html>

<head>
		<link rel="stylesheet" href="Home.css"/>
		<meta charset ="utf-8"/>
		<title>Connexion</title>
</head>


<form method="post"  enctype="multipart/form-data">
<label for="photo">Photo :</label>
<input type="file" name="avatar"/>
<input type="hidden" name="MAX_FILE_SIZE" value="100000">
<br/>
<input type="submit" name= Envoyer value="Envoyer"/>
</form>
<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', '');
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
	echo 'fkds';
	
			$mail='f@gmail.fr';
		
			$req = $bdd->prepare('SELECT id FROM utilisateur WHERE mail = ? ');
			$req->execute(array(
			$mail));
						//print_r ($req['id']);
						//var_dump $req;
						//die();
			$resul= $req->fetch();
			
			echo $resul['id'];
						
	
	   if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
     $taillemax=2097152;
     $extensionsvalides=array('jpg','jpeg','gif','png');
     if($_FILES['avatar']['size'] <= $taillemax){
       $extensionupload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1)); // check si tout minuscule et l'extension
       if(in_array($extensionupload, $extensionsvalides)){
         $chemin = "IMG/avatar/".$resul['id'].".".$extensionupload;
         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin); //stockage temporaire
         if($resultat){
           $req = $bdd->prepare('UPDATE utilisateur SET photo = :avatar WHERE id = :idutilisateur');
           $req-> execute(array(
             'avatar' => $resul['id'].".".$extensionupload,
             'idutilisateur' => $resul['id']
           ));
           //header('Location: profil.php');
         }
         else{
           $msg = "Erreur lors de l'importation de la photo de profil...";
         }
       }
       else{
         $msg = "Votre photo de profil doit être au format indiqué !";
       }
     }
     else{
       $msg = "Votre photo de profil ne doit pas dépasser 2 Mo !";
     }
   }?>
	 <?php
	 $mail='f@gmail.fr';
		
			$req = $bdd->prepare('SELECT photo FROM utilisateur WHERE mail = ? ');
			$req->execute(array(
			$mail));
						//print_r ($req['id']);
						//var_dump $req;
						//die();
			$resul1= $req->fetch();
			
			echo $resul1['photo'];
    if (!empty($resul1['photo'])){ ?>
      <img src="IMG/avatar/<?php echo $resul1['photo'];?>" alt="avatar" width="150" />
    <?php
    } ?>


</html>
