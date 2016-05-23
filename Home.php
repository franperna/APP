
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="home.css" />
        <title> Le site du sport </title>
    </head>

    <body>
        <div id="bloc_page">
             <header>
                 
    <img id="logo" src="Images site web/le_site_du_sport2.jpg" alt="Photo de sport" title="Le site du sport"/> 
                
                  


                     <h1> Le site du sport </h1>
                     
                 <nav>
                     <div id="Home">Accueil</div> 
                     <a href="Directory.php"id="Directory">Répertoire</a>
                     <a href="Group.php"id="Group">Groupe</a>  
                     <a href="Forums.php"id="Forums">Forum</a> 
                     <a href="Help.php" id="Help">Aide</a> 
                 </nav>
             </header>
     
             <section>

              <img id="life" src="Images site web/Fond/Fond8.jpg" alt="Photo de sport" title="Sport is life"/>
              

                 <article>
                     <h2> Le site du sport - Le secret</h2> 
                     <div id= "presentation"> Le site du sport est né du génie d'un groupe G7E, avide d'expérience, fougeux, et modestement "Oh t'es là", à ne pas confondre bien sûr avec le nutella.</br></br></br>

                     Le principe est simple: vous faire découvrir une aventure incroyable par le choix de groupes époustouflants à travers 4 sports de folie, le Baseball, le Rugby , le Volleyball et le Basketball.</br></br></br>
                     

                     Alors venez nous rejoindre! Inscrivez-vous tout de suite, sur ce site non payant et vecteur de rêves! Et pensez enfin à vous!
                      </div>  </br>
                     <div id= "news">Les dernières publications</div></br></br>
                     <div id="text"> Derniers groupes créés proche de chez vous:</div>
                 </article>

                 <aside>
                 <a id="inscription" type="button" href="Inscription.php">Inscription
                 </a>
                 

                  <div id="acces">
                     <form method="post">
                     <p>
                     <label for="pseudo"> Pseudo: </label> 
                     <input type="text" name="pseudo" id="pseudo" placeholder="Ex : Adey" size="20" maxlength="10" required/>

                     </br> </br>
                     <label for="pass">Mot de passe:</label>
                     <input type="password" name="pass" id="pass" placeholder="Mot de passe.." required/>

                     </p>
                     <input type="submit" id="conex" name=Ok value="Ok"/>
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

if(isset($_POST['Ok'])){
// Hachage du mot de passe
$pass_hache = sha1($_POST['pass']);

// Vérification des identifiants
$req = $bdd->prepare('SELECT id, pseudo FROM utilisateur WHERE pseudo = ? AND mot_de_passe = ?');
$req->execute(array(
     $_POST['pseudo'],
     $pass_hache));
    
$resultat = $req->fetch();


if (!$resultat)
{
    $message1 = "Mauvais identifiant ou mot de passe";
                      echo '<script type="text/javascript">window.alert("' . $message1 . '"); window.location.href="Home.php";</script>';
}
else
{
    session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $resultat['pseudo'];
    //print_r($_SESSION);
    
    $message2 = "Vous êtes connecté";
                      echo '<script type="text/javascript">window.alert("' . $message2 . '"); window.location.href="Home.php";</script>';
}
}
/*<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
}*/
?>

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

                 
                   <div id="Sports">
                     <h2> Nos sports </h2>
                     <p>
                     <div id="Sport">
                     <div id="Sport1">
                     <a href="baseball.php">Baseball</a> <a href="footballUS.php">Rugby </a> </br>
                     </div>
                     <div id="Sport2">
                     <a href="volleyball.php">Volleyball</a> 
                     <a href="basketball.php">Basketball</a> 
                     </div>
                     </div>
                     </p>
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
