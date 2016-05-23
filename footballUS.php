<!DOCTYPE html>
<html>
   <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="sport.css" />
        <title> Le site du sport </title>
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
					<img id="image" src="Images site web/FootballUS.jpg" alt="baseball"/>
					<p>
						<div id="combobox" >
						<label for="sport">Selectionner le sport </label><br />
						
						       <select id="sportif" name="sport" size=1 onchange ="javascript:location.href=this.value;">
               <option value="#"> </option>
               <option name="FootballUS" value="FootballUS.php" method="post">FootballUS</option>
               <option name="Baseball" value="Baseball.php" method="post">Baseball</option>
               <option name="Voleyball" value="Voleyball.php" method="post">Voleyball</option>
               <option name="Basketball" value="Basketball.php" method="post">Basketball</option>
       </select>

<script type="text/javascript">
    window.onload = function(){
        location.href=document.getElementById("sportif").value;
    }       
</script>
						</div>
					</p>
					<a id="groupe"  href="creergroupe.php">créer_groupe</a>
					<div id="paragraphe">
					
					<p> 
						Description de FootballUS
					</p>
					</div>
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