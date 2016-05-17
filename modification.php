<!DOCTYPE html>
<?php session_start();
?>
<html>

<head>
		<link rel="stylesheet" href="general.css"/>
		<meta charset ="utf-8"/>
		<title>modification</title>
</head>


<form method="post"  enctype="multipart/form-data">
<section>
<article>
       <legend>modification</legend>

<p>

<label for="firstname">Nom :</label>
<input type ="text" name="nom"  value="<?php if (isset($_SESSION['nom'])){echo htmlentities($_SESSION['nom']);} ?>"id="nom" placeholder="Nom.." requered/>
<br/>
<br/>
<label for="lastname">Prenom :</label>
<input type ="text" name="prenom"  value="<?php if (isset($_SESSION['prenom'])){echo htmlentities($_SESSION['prenom']);} ?>"id="prenom" placeholder="Prenom.."requered/>


<br/>




<br/>



 <label>Date de Naissance  </label><input type="date" name= "birthday" value="<?php if (isset($_SESSION['age'])){echo htmlentities($_SESSION['age']);} ?>" >(jj-mm-aaaa)<br/>




<br/>
<label for="phone">Numero de telephone :</label>
<input type ="tel" name="phone"  value="<?php if (isset($_SESSION['phone'])){echo htmlentities($_SESSION['phone']);} ?>"placeholder="06.."/>
<br/>
<br/>



<label for="photo">Photo :</label>
<input type="file" name="avatar"/>
<input type="hidden" name="MAX_FILE_SIZE" value="100000">
<br/>
<br/>
<label for="description"> Description </label><br/>
<textarea type="text" name="description" value="<?php if (isset($_SESSION['description'])){echo htmlentities($_SESSION['description']);} ?>"id="description"></textarea>

<br/>


<br/>



<input type="submit" name= Envoyer value="Envoyer"/>

</p>

</form>
</article>
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
 if(isset($_POST['Envoyer']))
    {

	
     /* // Je recupere les infos, plus securité pour le code.
        htmlentities($mot_de_passe = $_POST['mot_de_passe']);
        htmlentities($passcon = $_POST['passcon']);
        htmlentities($mail = $_POST['mail']);
        htmlentities($email2 = $_POST['email2']);
        //htmlentities($pseudo= $_POST['pseudo']);
        htmlentities($civilite = $_POST['civilite']);
        htmlentities($prenom = $_POST['prenom']);
        htmlentities($nom = $_POST['nom']);
        htmlentities($birthday = $_POST['birthday']);

        //htmlentities($user_post_office_box = $_POST['user_post_office_box']);
       // htmlentities($city = $_POST['city']);
        htmlentities($Regle=$_POST['Regle']);
		htmlentities($description=$_POST['description']);
	*/
		if(!empty($_POST['nom']))
			echo "hjjkl";
		{ htmlentities($nom = $_POST['nom']);
			$req = $bdd->prepare('SELECT id FROM utilisateur WHERE mail = ? ');
			$req->execute(array(
			$_SESSION['mail']));
						//print_r ($req['id']);
						//var_dump $req;
						//die();
			$resul= $req->fetch();
							
			var_dump($resul['id']);
						
						
					$reponse = $bdd->query('UPDATE  utilisateur SET nom=\''.$nom.'\' WHERE id=\''.$resul['id'].'\'');
					$_SESSION['nom'] = $_POST['nom'];
                    echo "vos information personnelles ont bien été modifiées";
					//header('location: profil.php');
                      //echo '<script type="text/javascript">window.alert("'.$message0.'"); window.location.href="testinscription.php";</script>';
		}	
		if(!empty($_POST['prenom']))
		{ htmlentities($prenom = $_POST['prenom']);
			$req = $bdd->prepare('SELECT id FROM utilisateur WHERE mail = ? ');
			$req->execute(array(
			$_SESSION['mail']));
						//print_r ($req['id']);
						//var_dump $req;
						//die();
			$resul= $req->fetch();
							
			var_dump($resul['id']);
						
						
					$reponse = $bdd->query('UPDATE  utilisateur SET prenom=\''.$prenom.'\' WHERE id=\''.$resul['id'].'\'');
					$_SESSION['prenom'] = $_POST['prenom'];
                    echo "vos information personnelles ont bien été modifiées";
		}
		if(!empty( $_POST['birthday']))
		{ htmlentities($birthday = $_POST['birthday']);
			$req = $bdd->prepare('SELECT id FROM utilisateur WHERE mail = ? ');
			$req->execute(array(
			$_SESSION['mail']));
						//print_r ($req['id']);
						//var_dump $req;
						//die();
			$resul= $req->fetch();
							
			var_dump($resul['id']);
						
						
					$reponse = $bdd->query('UPDATE  utilisateur SET age=\''.$birthday.'\' WHERE id=\''.$resul['id'].'\'');
					$_SESSION['age'] = $_POST['birthday'];
		          echo "vos information personnelles ont bien été modifiées";
		} 
		
		//photo
		$req = $bdd->prepare('SELECT id FROM utilisateur WHERE mail = ? ');
			$req->execute(array(
			$_SESSION['mail']));
						//print_r ($req['id']);
						//var_dump $req;
						//die();
			$resul= $req->fetch();
							
			var_dump($resul['id']);
						
	
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
   }
	
		if(!empty($_POST['description']))
		{ htmlentities($description = $_POST['description']);
			$req = $bdd->prepare('SELECT id FROM utilisateur WHERE mail = ? ');
			$req->execute(array(
			$_SESSION['mail']));
						//print_r ($req['id']);
						//var_dump $req;
						//die();
			$resul= $req->fetch();
							
			var_dump($resul['id']);
						
						
					$reponse = $bdd->query('UPDATE  utilisateur SET description=\''.$description.'\' WHERE id=\''.$resul['id'].'\'');
					$_SESSION['description'] = $_POST['description'];
		          echo "vos information personnelles ont bien été modifiées";
		}
		header('location: profil.php');
	}	
	
?>


</html>
