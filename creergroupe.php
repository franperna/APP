<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="sport.css" />
	<title>Le site du sport</title>
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
      <section>

				<img id="life" src="Images site web/Fond/Fond8.jpg" alt="Photo de sport" title="Sport is life"/>
					<article>				
				
				<form method="post"  action="bdgroupe.php"  enctype="multipart/form-data">

                     <p>
                     <label> Nom Du Groupe: </label> 
                     <input type="text" name="nomgroupe" id="nomgroupe" placeholder="" size="20" maxlength="50" /> </p>
					 
                     
					 </br>

</br> Sport:
          <select id="selectbox" name="sport" size=1>
          <option value="#"> </option>
          <?php
$req = $bdd->query('SELECT id,type FROM sport ORDER BY id');
while ($donnees = $req->fetch())
{
?>
               <option name="sport" value="<?php echo htmlspecialchars($donnees['id']); ?>" method="post"> <?php echo htmlspecialchars($donnees['type']); ?> </option>
             <?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
         </select>      
  </br>
       </br>


       Jour:
       <select id="selectbox" name="jour" size=1>
               <option name="jour" value="#"> </option>
               <option name="jour" value="Lundi" method="post">Lundi</option>
               <option name="jour" value="Mardi" method="post">Mardi</option>
               <option name="jour" value="Mercredi" method="post">Mercredi</option>
               <option name="jour" value="Jeudi" method="post">Jeudi</option>
               <option name="jour" value="Vendredi" method="post">Vendredi</option>
               <option name="jour" value="Samedi" method="post">Samedi</option>
               <option name="jour" value="Dimanche" method="post">Dimanche</option>
       </select>
					 </br>
					
					 
					
					 
					 </br>
					              Journée :
<input type="radio" name="journee" id="sport" value=matin /> <label for="journee">matin</label>
<input type="radio" name="journee" id="sport" value=après-midi /> <label for="journee"> après-midi</label>
<input type="radio" name="journee" id="sport" value=soir /> <label for="journee"> soir </label>  
					  <br/>

            <label> Ville: </label> 
                     <input type="text" name="ville" id="ville" placeholder="Paris" size="20" maxlength="50" /> </p>
                <p>
                     <label for="pseudo"> Club: </label> 
                     <input type="text" name="club" id="adressegroupe" placeholder="" size="20" maxlength="50" /> </p>
                  <br/>  
<br/>
<label for="description"> Description :</label><br/>
<textarea name="description" id="description"></textarea>
<br/>
  <br/>
  </br>
          
        
                    
          
           
           </br>
                
                  <br/>  

                    
              
					 </br>
					 <input type="submit" value="valider"/>
                    
					</form>
					</article>

<aside>
					<div id="calendrier">
                     <iframe name="InlineFrame1" id="InlineFrame1" style="width:180px;height:220px;" src="http://www.mathieuweb.fr/calendrier/calendrier-des-semaines.php?nb_mois=1&nb_mois_ligne=4&mois=&an=&langue=fr&texte_color=B9CBDD&week_color=DAE9F8&week_end_color=C7DAED&police_color=453413&sel=true" scrolling="no" frameborder="0" allowtransparency="true"></iframe>


                     </br> 

                     <a href="https://www.facebook.com/"> <img id="facebook" src="Images site web/0facebook-miniature.jpg" alt="Photo de facebook" title="Facebook"/> </a>
                     <a href="https://www.twitter.com/"> <img id="twitter"src="Images site web/Twitter_logo.mini.mini.png" alt="Photo de twitter" title="Twitter"/> </a>
                     <a href="https://www.gmail.com/"> <img id="gmail" src="Images site web/images.mini.mini.mini.jpg" alt="Photo de gmail" title="Gmail"/> </a>
                     </div>
                     </aside>
				</section>
				<footer>
                     <a href="Francais.html"> <img id="france" src="Images site web/drapeauF.gif" alt="Drapeau de la France" title="Français"/> </a>
                     <a href="Américain.html"> <img id="amerique" src="Images site web/flagus.mini.mini.mini.gif" alt="Drapeau des Etats Unis" title="Anglais"/> </a>
             </footer>
        </div>
    </body>
</html>