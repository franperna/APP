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
		<title>modification</title>
</head>


<form method="post"  enctype="multipart/form-data">
<section>
<article>
       <legend>modification</legend>

<p>


<br/>

Sport:
          <select id="selectbox" name="sport" size=1>
          <option value="#"> </option>
          <?php
$req = $bdd->query('SELECT id,type FROM sport ORDER BY id');
while ($donnees = $req->fetch())
{
?>
               <option name="sport" value="<?php echo htmlspecialchars($donnees['id']); ?>" method="post"<?php if (isset($_SESSION['sport'])&& $_SESSION['sport']==$donnees['id'] ){echo 'selected';}?>> <?php echo htmlspecialchars($donnees['type']); ?> </option>
             <?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
         </select>

<br/>

 Jour:
       <select id="selectbox" name="jour" size=1>
               <option name="jour" value="#"> </option>
               <option name="jour" value="Lundi" method="post"<?php if (isset($_SESSION['jour'])&& $_SESSION['jour']=='Lundi' ){echo 'selected';} ?>>Lundi</option>
               <option name="jour" value="Mardi" method="post"<?php if (isset($_SESSION['jour'])&& $_SESSION['jour']=='Mardi' ){echo 'selected';} ?>>Mardi</option>
               <option name="jour" value="Mercredi" method="post"<?php if (isset($_SESSION['jour'])&& $_SESSION['jour']=='Mercredi' ){echo 'selected';} ?>>Mercredi</option>
               <option name="jour" value="Jeudi" method="post"<?php if (isset($_SESSION['jour'])&& $_SESSION['jour']=='Jeudi' ){echo 'selected';} ?>>Jeudi</option>
               <option name="jour" value="Vendredi" method="post"<?php if (isset($_SESSION['jour'])&& $_SESSION['jour']=='Vendredi' ){echo 'selected';} ?>>Vendredi</option>
               <option name="jour" value="Samedi" method="post"<?php if (isset($_SESSION['jour'])&& $_SESSION['jour']=='Samedi' ){echo 'selected';} ?>>Samedi</option>
               <option name="jour" value="Dimanche" method="post"<?php if (isset($_SESSION['jour'])&& $_SESSION['jour']=='Dimanche' ){echo 'selected';} ?>>Dimanche</option>
       </select>
					 </br>
					
					 
					
					 
					 </br>
					              Journée: 

<input type="radio" name="journee" id="sport" value=matin <?php if (isset($_SESSION['journee'])&& $_SESSION['journee']=='matin' ){echo 'checked';} ?>> <label for="journee">matin</label>
<input type="radio" name="journee" id="sport" value=après-midi <?php if (isset($_SESSION['journee'])&& $_SESSION['journee']=='après-midi' ){echo 'checked';} ?>> <label for="journee"> après-midi</label>
<input type="radio" name="journee" id="sport" value=soir <?php if(isset($_SESSION['journee'])&& $_SESSION['journee']=='soir' ){echo 'checked';} ?>> <label for="journee"> soir </label> 
					  <br/>
					   <br/>

            <label> Ville: </label> 
                     <input type="text" name="ville" value="<?php if (isset($_SESSION['club'])){echo htmlentities($_SESSION['villeg']);} ?>" id="ville"  size="20" maxlength="50" />
                <p>
                     <label for="pseudo"> Club: </label> 
                     <input type="text" name="club" value="<?php if (isset($_SESSION['club'])){echo htmlentities($_SESSION['club']);} ?>" placeholder="" size="20" maxlength="50" /> </p>
                  <br/>  
<br/>
<label for="description"> Description :</label><br/>
<textarea name="description" id="description"><?php if (isset($_SESSION['descriptiong'])){echo htmlentities($_SESSION['descriptiong']);} ?> </textarea>
<br/>


<br/>




<label for="photo">Photo :</label>
<input type="file" value="<?php if (isset($_SESSION['photog'])){echo htmlentities($_SESSION['photog']);} ?>"name="avatar"/>
<input type="hidden" name="MAX_FILE_SIZE" value="100000">
<br/>
<input type="submit" name= Envoyer value="Envoyer"/>

</p>

</form>
</article>

<?php
 if(isset($_POST['Envoyer']))
    {
	

		if(!empty($_POST['sport']))
		
		{ htmlentities($sport = $_POST['sport']);
			$req = $bdd->prepare('SELECT id FROM groupe WHERE nomgroupe = ? ');
			$req->execute(array(
			$_SESSION['nomgroupe']));

			$resul= $req->fetch();
							
			
						
						
					$reponse = $bdd->query('UPDATE  groupe SET id_sport=\''.$sport.'\' WHERE id=\''.$resul['id'].'\'');
					$_SESSION['sport'] = $_POST['sport'];
                    

		}	
		if(!empty($_POST['jour']))
		{ htmlentities($jour = $_POST['jour']);
			$req = $bdd->prepare('SELECT id FROM groupe WHERE nomgroupe = ? ');
			$req->execute(array(
			$_SESSION['nomgroupe']));

			$resul= $req->fetch();
							
			
						
						
					$reponse = $bdd->query('UPDATE  groupe SET jour=\''.$jour.'\' WHERE id=\''.$resul['id'].'\'');
					$_SESSION['jour'] = $_POST['jour'];
                    
		}
		if(!empty( $_POST['journee']))
		{ htmlentities($journee = $_POST['journee']);
			$req = $bdd->prepare('SELECT id FROM groupe WHERE nomgroupe = ? ');
			$req->execute(array(
			$_SESSION['nomgroupe']));

			$resul= $req->fetch();
							
			
						
						
					$reponse = $bdd->query('UPDATE  groupe SET journee=\''.$journee.'\' WHERE id=\''.$resul['id'].'\'');
					$_SESSION['journee'] = $_POST['journee'];
		          
		} 

if(!empty($_POST['ville']))
		{ htmlentities($ville = $_POST['ville']);
			$req = $bdd->prepare('SELECT id FROM groupe WHERE nomgroupe = ? ');
			$req->execute(array(
			$_SESSION['nomgroupe']));

			$resul= $req->fetch();
							
			
						
						
					$reponse = $bdd->query('UPDATE  groupe SET ville=\''.$ville.'\' WHERE id=\''.$resul['id'].'\'');
					$_SESSION['villeg'] = $_POST['ville'];
		          
		}


		if(!empty($_POST['club']))
		{ htmlentities($club = $_POST['club']);
			$req = $bdd->prepare('SELECT id FROM groupe WHERE nomgroupe = ? ');
			$req->execute(array(
			$_SESSION['nomgroupe']));

			$resul= $req->fetch();
							
			
						
						
					$reponse = $bdd->query('UPDATE  groupe SET club=\''.$club.'\' WHERE id=\''.$resul['id'].'\'');
					$_SESSION['club'] = $_POST['club'];
		          
		}

		if(!empty($_POST['description']))
		{ htmlentities($description = $_POST['description']);
			$req = $bdd->prepare('SELECT id FROM groupe WHERE nomgroupe = ? ');
			$req->execute(array(
			$_SESSION['nomgroupe']));

			$resul= $req->fetch();
							
			
						
						
					$reponse = $bdd->query('UPDATE  groupe SET description=\''.$description.'\' WHERE id=\''.$resul['id'].'\'');
					$_SESSION['descriptiong'] = $_POST['description'];
		          
		}
		
		//photo
		$req = $bdd->prepare('SELECT id FROM groupe WHERE nomgroupe = ? ');
			$req->execute(array(
			$_SESSION['nomgroupe']));

			$resul= $req->fetch();
							
			
						
	
		if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
		$taillemax=2097152;
		$extensionsvalides=array('jpg','jpeg','gif','png');
		if($_FILES['avatar']['size'] <= $taillemax){
		$extensionupload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1)); // check si tout minuscule et l'extension
			if(in_array($extensionupload, $extensionsvalides)){
			$chemin = "IMG/groupe/".$resul['id'].".".$extensionupload;
			$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin); //stockage temporaire
			if($resultat){
			$req = $bdd->prepare('UPDATE groupe SET photo = :avatar WHERE id = :idgroupe');
           $req-> execute(array(
             'avatar' => $resul['id'].".".$extensionupload,
             'idgroupe' => $resul['id']
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
   header('Location: profilgroupe.php?nom='.$_GET['nom']);	
	}	
    
?>


</html>