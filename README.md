<!DOCTYPE html>
<html>

<head>
		<link rel="stylesheet" href="general.css"/>
		<meta charset ="utf-8"/>
		<title>testinscription</title>
</head>


<form method ="post" >
<section>
<article>
       <legend>Inscription</legend>
	   
<p>



<label for="pseudo">Pseudo :</label>
<input type ="text" name="pseudo" id="pseudo" placeholder="Pseudo.." required/>
<br/>
<br/>
<label for="pass">Mot de passe :</label>
<input type ="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe.." required/>
<br/>

<br/>
<label for="passcon">Confirmation mot de passe :</label></td>
<input type ="password" name="passcon" id="passcon" placeholder="Mot de passe.." required/>



<br/>
Sexe :
<input type="radio" name="civilite" id="civilite" value="Homme"/> <label for="masculin">Masculin</label>
<input type="radio" name="civilite" id="civilite" value="femme"/> <label for="feminin">Feminin</label>

<br/>
<br/>
<label for="firstname">Nom :</label>
<input type ="text" name="nom" id="nom" placeholder="Nom.." requered/>
<br/>
<br/>
<label for="lastname">Prenom :</label>
<input type ="text" name="prenom" id="prenom" placeholder="Prenom.."requered/>
<br/>

<br/>


<label>Date de Naissance  </label><input type="date" name= "birthday" max="2016-01-01" min="1900-01-01">(jj-mm-aaaa)<br/><br/>

  


<br/>
<br/>
<label for="phone">Numero de telephone :</label>
<input type ="tel" name="phone" placeholder="06.."/>
<br/>
<br/>
<label for="email1">Email :</label>
<input type ="email" name="mail" id="email1" placeholder="Email.."requered//>
<br/>

<br/>
<label for="email2">Confirmation Email :</label>
<input type ="email" name="email2" id="email2" placeholder="Email.." required/>

<br/>
<br/>
<label for="photo">Photo :</label>
<input type="file" name="logo"/>
<input type="hidden" name="MAX_FILE_SIZE" value="100000">
<br/>

<br/>
<label for="description"> Description </label><br/>
<textarea name="description" id="description"></textarea>
<br/>
<br/>

<input type="checkbox" name="Regle"> Reglement à valider </a></br></br>
 
<br/>


<input type="reset" value="Reset"/>

<input type="submit" name= Envoyer value="Envoyer"/>

</p>

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
 if(isset($_POST['Envoyer']))
    {
    
      
      // Je recupere les infos, plus securité pour le code.
        htmlentities($mot_de_passe = $_POST['mot_de_passe']);
        htmlentities($passcon = $_POST['passcon']);
        htmlentities($mail = $_POST['mail']);
        htmlentities($email2 = $_POST['email2']);
        htmlentities($pseudo= $_POST['pseudo']);
        htmlentities($civilite = $_POST['civilite']);
        htmlentities($prenom = $_POST['prenom']);
        htmlentities($nom = $_POST['nom']);
        htmlentities($birthday = $_POST['birthday']);
        
        //htmlentities($user_post_office_box = $_POST['user_post_office_box']);
        htmlentities($city = $_POST['city']);
        htmlentities($Regle=$_POST['Regle']);
		htmlentities($description=$_POST['description']);
    
        // empecher les codes php dans la base
      // Je verifie que TOUT les champs sont remplis.
      if(empty($mot_de_passe)||empty($mail)|| empty($Regle)|| empty($prenom) || empty($prenom) || empty($birthday )  || empty($mail)|| empty($description) )
      {
                    $message0="Vous devez remplir toutes les coordonnées";
                      echo '<script type="text/javascript">window.alert("'.$message0.'"); window.location.href="testinscription.php";</script>';
      }
	  // filter_var permet de verifier la validité de l'email
      else {
          if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
              $sql = $bdd->prepare('SELECT mail FROM utilisateur WHERE mail = \'' . $mail . '\';');
              $sql->execute(array('.$mail.' => $_POST['mail']));
              $res = $sql->fetch();
              if ($res) {
                  $message3 = "L\'Email que vous avez utilisé existe déjà";
                  echo '<script type="text/javascript">window.alert("' . $message3 . '"); window.location.href="testinscription.php";</script>';
              } else {
                  if (($mot_de_passe == $passcon) && ($mail == $email2)) {
					  $pass_hache = sha1($_POST['mot_de_passe']);
                      $reponse = $bdd->query("INSERT INTO utilisateur VALUES('$nom', '$prenom','$mail', '$mot_de_passe', '$birthday', '$description','$civilite','$pseudo'");
					 /*$req = $bdd->prepare('INSERT INTO utilisateur (nom,prenom,mail,mot_de_passe,age,civilite,pseudo) VALUES(?,?,?,?,?,?,?)');
						$req->execute(array(
						$nom,
						$prenom,
						$mail,
						$pass_hache,
						$birthday,
						$civilite,
						$pseudo
						));*/
                      //affiche un mot gentil, dans le futur on doit changer pour que ceci apparaisse sur une autre.nom,prenom,mail,mot_de_passe,age,civilite,pseudo
                      $message = "Bonjour $prenom votre compte est bien enregistré";
                      echo '<script type="text/javascript">window.alert("' . $message . '"); window.location.href="testinscription.php";</script>';
                  } else {
                      $message1 = "Les deux mots de passe ou les deux e-mails que vous avez rentrés ne correspondent pas";
                      echo '<script type="text/javascript">window.alert("' . $message1 . '"); window.location.href="testinscription.php";</script>';
                  }
              }
          } else {
              $message2 = "Votre email n\'est pas valide";
              echo '<script type="text/javascript">window.alert("' . $message2 . '"); //window.location.href="testinscription.php";</script>';
          }
      }
    }
    
?>
</table>
</div>

</article>
</section>

</body>
</html>


# APP
