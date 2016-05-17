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
session_start(); ?>

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

<form action="message_post.php?sujet=<?php echo $_GET['sujet'];?>&rubrique=<?php echo $_GET['rubrique']; ?>" method="post">
        <p>
        <h2>Commentaires</h2>
        </br></br>
        <label for="texte">Votre commentaire</label> : <input type="text" name="texte" id="texte" /><br />

        <input type="submit" value="Envoyer" />
    </p>
</form>

        <p><a href="rubrique.php?sujet=<?php echo $_GET['sujet'];?>">Retour à la liste des billets</a></p>
 

<?php
// Récupération du billet
$req = $bdd->query('SELECT r.id AS id , r.titre AS titre, r.description AS description, r.id_sujet AS id_sujet, r.id_utilisateur AS id_utilisateur ,u.id AS idd, u.pseudo AS pseudo FROM rubrique r INNER JOIN utilisateur u ON r.id_utilisateur=u.id ORDER BY r.id DESC');
while($donnees = $req->fetch()){

if($donnees['id']==$_GET['rubrique'] && $donnees['id_utilisateur']==$donnees['idd'] ){
?>

<div class="newss">
    <h3>
        <?php echo htmlspecialchars($donnees['pseudo'])?> &nbsp; &nbsp; &nbsp; &nbsp; <?php echo htmlspecialchars($donnees['titre']); ?>
    </h3>
    
    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['description']));
    ?>
    </p>
</div>

<?php
}
}
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
$req = $bdd->query('SELECT m.id AS id, m.texte AS texte, DATE_FORMAT(m.date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_message_fr,m.id_rubrique AS id_rubrique, m.id_utilisateur AS id_utilisateur, u.id AS idd, u.pseudo AS pseudo FROM message m INNER JOIN utilisateur u ON m.id_utilisateur=u.id ORDER BY m.date DESC');

while ($donnees = $req->fetch())
{
if($donnees['id_rubrique']==$_GET['rubrique'] && $donnees['id_utilisateur']==$donnees['idd'] ){
?>
<p><?php echo htmlspecialchars($donnees['pseudo'])?> &nbsp; &nbsp; &nbsp; &nbsp; le <?php echo $donnees['date_message_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['texte'])); ?></p>

<?php
} 
}// Fin de la boucle des commentaires
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
