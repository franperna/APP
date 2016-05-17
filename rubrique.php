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
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="style.css" rel="stylesheet" /> 
    </head>

    <body>
    <div id="bloc_page">
             <header>
                 
                     <img id="logo" src="Images site web/le_site_du_sport2.jpg" alt="Photo de sport" title="Le site du sport"/> 
                  


                     <h1> Le site du sport </h1>
                     
                 <nav>
                     <a href="Home.php" id="Home">Accueil</a> 
                     <a href="Directory.php"id="Directory">Répertoire</a>
                     <a href="Group.php"id="Group">Groupe</a>
                     <div id="Forums">Forum</div> 
                     <a href="Help.php" id="Help">Aide</a> 
                 </nav>
             </header>
     
             <section>

             <img id="life" src="Images site web/Fond/Fond8.jpg" alt="Photo de sport" title="Sport is life"/>
                 <article>
                     <h2> Forum </h2> 
                     <div id= "presentation">
                     Choisis ton sport
                      </div>  </br>

                     <div id= "news">
<select id="selectbox" name="sport" size=1 onchange ="javascript:location.href=this.value;">
               <option value="#"> </option>
               <?php
$req = $bdd->query('SELECT id,texte FROM sujet ORDER BY id');
while ($donnees = $req->fetch())
{
?>
               <option name="sport" value="rubrique.php?sujet=<?php echo htmlspecialchars($donnees['id']); ?>" method="post"><?php echo htmlspecialchars($donnees['texte']); ?> </option>
               <?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
       </select> 

<script type="text/javascript">
    window.onload = function(){
        location.href=document.getElementById("selectbox").value;
    }       
</script>
<?php
$req = $bdd->query('SELECT id,texte FROM sujet ORDER BY id');
while ($donnees = $req->fetch())
{ 

if($_GET['sujet']==htmlspecialchars($donnees['id'])){
echo '<h2>'.htmlspecialchars($donnees['texte']).'</h2>';
}
              
} // Fin de la boucle des billets
$req->closeCursor();
?>

</br> </br>
<form action="rubrique_post.php?sujet=<?php echo $_GET['sujet']; ?>" method="post">


        <p>
        <label for="titre">Titre de votre rubrique</label> : <input type="text" name="titre" id="titre" /><br />
        <label for="description">Description de votre rubrique</label> :  <input type="text" name="description" id="description" /><br />

        <input type="submit" value="Envoyer" />
    </p>
</form>

        <p>Derniers billets du blog :</p>
 


<?php
// On récupère les 5 derniers billets
$req = $bdd->query('SELECT r.id AS id , r.titre AS titre, r.description AS description, r.id_sujet AS id_sujet, r.id_utilisateur AS id_utilisateur ,u.id AS idd, u.pseudo AS pseudo FROM rubrique r INNER JOIN utilisateur u ON r.id_utilisateur=u.id ORDER BY r.id DESC');

while ($donnees = $req->fetch())
{
if($donnees['id_sujet']==$_GET['sujet'] && $donnees['id_utilisateur']==$donnees['idd'] ){

?>
<div class="newss">
    <h3>
        <?php echo htmlspecialchars($donnees['pseudo'])?> &nbsp; &nbsp; &nbsp; &nbsp; <?php echo htmlspecialchars($donnees['titre']); ?>
    </h3>
    
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['description']));
    ?>
    <br/>
    <em><a href="message.php?sujet=<?php echo $_GET['sujet'];?>&rubrique=<?php echo $donnees['id'];?>" >Commentaires</a></em>
    </p>
</div>

<?php
}
} // Fin de la boucle des billets
$req->closeCursor();
?>
</div></br></br>


                    
                 </article>

                 <aside>
                 <a id="inscription" type="button" href="Inscription.php">Inscription
                 </a>
                 

                  <div id="acces">
                     <form method="post" action="traitement.php">
                     <p>
                     <label for="pseudo"> Pseudo: </label> 
                     <input type="text" name="pseudo" id="pseudo" placeholder="Ex : Adey" size="20" maxlength="10" />

                     </br> </br>
                     <label for="pass">Mot de passe:</label>
                     <input type="password" name="pass" id="pass" />

                     </p>
                      </form>

                </div>

                 <div id="oubli">
                     <a href="Password.html">Mot de passe oublié?</a> </br>
                     <a href="Administrator.html"> Se connecter en tant qu'administrateur </a></br>
                     </div>

                     <div id="calendrier">
                     <iframe name="InlineFrame1" id="InlineFrame1" style="width:180px;height:220px;" src="http://www.mathieuweb.fr/calendrier/calendrier-des-semaines.php?nb_mois=1&nb_mois_ligne=4&mois=&an=&langue=fr&texte_color=B9CBDD&week_color=DAE9F8&week_end_color=C7DAED&police_color=453413&sel=true" scrolling="no" frameborder="0" allowtransparency="true"></iframe>

                     </br> 

                     <a href="https://www.facebook.com/Le-Site-Du-Sport-524017067799586/timeline"> <img id="facebook" src="Images site web/0facebook-miniature.jpg" alt="Photo de facebook" title="Facebook"/> </a>
                     <a href="https://twitter.com/LeSiteduSport"> <img id="twitter"src="Images site web/Twitter_logo.mini.mini.png" alt="Photo de twitter" title="Twitter"/> </a>
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