<!DOCTYPE html>
<html>

<head>
		<link rel="stylesheet" href="inscription.css"/>
		<meta charset ="utf-8"/>
		<title>Inscription</title>
</head>

<body>
        <div id="bloc_page">
             <header>
                 
                    <img id="logo" src="Images site web/le_site_du_sport2.jpg" alt="Photo de sport" title="Le site du sport"/> 

                  


                     <h1> Le site du sport </h1>
                     
                 <nav>
                     <a href="Home.php"id="Home">Accueil</a> 
                     <a href="Directory.php"id="Directory">Répertoire</a>
                     <a href="Group.php"id="Group">Groupe</a>  
                     <a href="Forums.php"id="Forums">Forum</a> 
                     <a href="Help.php" id="Help">Aide</a> 
                 </nav>
             </header>
<form method ="post" enctype="multipart/form-data">
<section>
<img id="life" src="Images site web/Fond/Fond8.jpg" alt="Photo de sport" title="Sport is life"/>
<article>

<div id="news">
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


<label for="birth">Date de naissance :</label>


  <select name="day" id="day">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
          <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">7</option>
           <option value="8">8</option>
           <option value="9">9</option>
       <option value="10">10</option>
       <option value="11">11</option>
           <option value="12">12</option>
           <option value="13">13</option>
           <option value="14">14</option>
       <option value="15">15</option>
           <option value="16">16</option>
           <option value="17">17</option>
           <option value="18">18</option>
           <option value="19">19</option>
       <option value="20">20</option>
       <option value="21">21</option>
           <option value="22">22</option>
           <option value="23">23</option>
           <option value="24">24</option>
       <option value="25">25</option>
           <option value="26">26</option>
           <option value="27">27</option>
           <option value="28">28</option>
           <option value="29">29</option>
       <option value="30">30</option>
       <option value="31">31</option>
       </select>
  <select name="month" id="month">
           <option value="01">Janvier</option>
           <option value="02">Février</option>
           <option value="03">Mars</option>
           <option value="04">Avril</option>
           <option value="05">Mai</option>
           <option value="06">Juin</option>
           <option value="07">Juillet</option>
           <option value="08">Août</option>
       <option value="09">Septembre</option>
       <option value="10">Octobre</option>
           <option value="11">Novembre</option>
       <option value="12">Décembre</option>
       </select> 
 <select name="year" id="year">
           <option value="1921">1921</option>
           <option value="1922">1922</option>
           <option value="1923">1923</option>
       <option value="1924">1924</option>
           <option value="1925">1925</option>
           <option value="1926">1926</option>
           <option value="1927">1927</option>
           <option value="1928">1928</option>
           <option value="1929">1929</option>
       <option value="1930">1930</option>
       <option value="1931">1931</option>
           <option value="1932">1932</option>
           <option value="1933">1933</option>
       <option value="1934">1934</option>
           <option value="1935">1935</option>
           <option value="1936">1936</option>
           <option value="1937">1937</option>
           <option value="1938">1938</option>
           <option value="1939">1939</option>
       <option value="1940">1940</option>
       <option value="1941">1941</option>
           <option value="1942">1942</option>
           <option value="1943">1943</option>
       <option value="1944">1944</option>
           <option value="1945">1945</option>
           <option value="1946">1946</option>
           <option value="1947">1947</option>
           <option value="1948">1948</option>
           <option value="1949">1949</option>
       <option value="1950">1950</option>
       <option value="1951">1951</option>
           <option value="1952">1952</option>
           <option value="1953">1953</option>
       <option value="1954">1954</option>
           <option value="1955">1955</option>
           <option value="1956">1956</option>
           <option value="1957">1957</option>
           <option value="1958">1958</option>
           <option value="1959">1959</option>
       <option value="1960">1960</option>
       <option value="1961">1961</option>
           <option value="1962">1962</option>
           <option value="1963">1963</option>
       <option value="1964">1964</option>
           <option value="1965">1965</option>
           <option value="1966">1966</option>
           <option value="1967">1967</option>
           <option value="1968">1968</option>
           <option value="1969">1969</option>
       <option value="1970">1970</option>
       <option value="1971">1971</option>
           <option value="1972">1972</option>
           <option value="1973">1973</option>
       <option value="1974">1974</option>
           <option value="1975">1975</option>
           <option value="1976">1976</option>
           <option value="1977">1977</option>
           <option value="1978">1978</option>
           <option value="1979">1979</option>
       <option value="1980">1980</option>
       <option value="1981">1981</option>
           <option value="1982">1982</option>
           <option value="1983">1983</option>
       <option value="1984">1984</option>
           <option value="1985">1985</option>
           <option value="1986">1986</option>
           <option value="1987">1987</option>
           <option value="1988">1988</option>
           <option value="1989">1989</option>
       <option value="1990">1990</option>
       <option value="1991">1991</option>
           <option value="1992">1992</option>
           <option value="1993">1993</option>
       <option value="1994">1994</option>
           <option value="1995">1995</option>
           <option value="1996">1996</option>
           <option value="1997">1997</option>
           <option value="1998">1998</option>
           <option value="1999">1999</option>
       <option value="2000">2000</option>
       <option value="2001">2001</option>
           <option value="2002">2002</option>
           <option value="2003">2003</option>
       <option value="2004">2004</option>
           <option value="2005">2005</option>
           <option value="2006">2006</option>
           <option value="2007">2007</option>
           <option value="2008">2008</option>
           <option value="2009">2009</option>
       <option value="2010">2010</option>
       <option value="2011">2011</option>
           <option value="2012">2012</option>
           <option value="2013">2013</option>
       </select>

<br/>
<br/>
<label for="phone">Numero de telephone :</label>
<input type ="tel" name="phone" placeholder="06.."/>
<br/>
<br/>
<label for="email1">Email :</label>
<input type ="email" name="mail" id="fmail1" placeholder="Email.."requered//>
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
  $bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', 'root');
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
        htmlentities($birthday= $_POST['day']." ".$_POST['month']." ".$_POST['year']);
        
        //htmlentities($user_post_office_box = $_POST['user_post_office_box']);
        htmlentities($city = $_POST['city']);
        htmlentities($Regle=$_POST['Regle']);
    htmlentities($description=$_POST['description']);
    
        // empecher les codes php dans la base
      // Je verifie que TOUT les champs sont remplis.
      if(empty($mot_de_passe)||empty($mail)|| empty($Regle)|| empty($prenom) || empty($prenom) || empty($birthday )  || empty($mail)|| empty($description) )
      {
                    $message0="Vous devez remplir toutes les coordonnées";
                      echo '<script type="text/javascript">window.alert("'.$message0.'"); window.location.href="inscription.php";</script>';
      }
    // filter_var permet de verifier la validité de l'email
      else {
          if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
              $sql = $bdd->prepare('SELECT mail FROM utilisateur WHERE mail = \'' . $mail . '\';');
              $sql->execute(array('.$mail.' => $_POST['mail']));
              $res = $sql->fetch();
              if ($res) {
                  $message3 = "L\'Email que vous avez utilisé existe déjà";
                  echo '<script type="text/javascript">window.alert("' . $message3 . '"); window.location.href="inscription.php";</script>';
              } else {
                  if (($mot_de_passe == $passcon) && ($mail == $email2)) {
            $pass_hache = sha1($mot_de_passe);
                      //$reponse = $bdd->query("INSERT INTO utilisateur VALUES('$nom', '$prenom','$mail', '$mot_de_passe', '$birthday', '$description','$civilite','$pseudo'");
           $req = $bdd->prepare('INSERT INTO utilisateur (nom,prenom,mail,mot_de_passe,age,description,civilite,pseudo) VALUES(?,?,?,?,?,?,?,?)');
            $req->execute(array(
            $nom, $prenom,$mail,$pass_hache,$birthday,$description,$civilite,$pseudo
            ));
                      //affiche un mot gentil, dans le futur on doit changer pour que ceci apparaisse sur une autre.nom,prenom,mail,mot_de_passe,age,civilite,pseudo
                      $message = "Bonjour $prenom votre compte est bien enregistré";
                      echo '<script type="text/javascript">window.alert("' . $message . '"); window.location.href="inscription.php";</script>';
                      session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $resultat['pseudo'];
    //print_r($_SESSION);
                  } else {
                      $message1 = "Les deux mots de passe ou les deux e-mails que vous avez rentrés ne correspondent pas";
                      echo '<script type="text/javascript">window.alert("' . $message1 . '"); window.location.href="inscription.php";</script>';
                  }
              }
          } else {
              $message2 = "Votre email n\'est pas valide";
              echo '<script type="text/javascript">window.alert("' . $message2 . '"); //window.location.href="inscription.php";</script>';
          }
      }
    }
    
?>
</table>
</div>
</article>
</section>
<footer>
                     <a href="Francais.html"> <img id="france" src="Images site web/drapeauF.gif" alt="Drapeau de la France" title="Français"/> </a>
                     <a href="Américain.html"> <img id="amerique" src="Images site web/flagus.mini.mini.mini.gif" alt="Drapeau des Etats Unis" title="Anglais"/> </a>
             </footer>
        </div>


</body>
</html>


