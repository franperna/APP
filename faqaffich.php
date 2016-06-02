<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="faqaffich.css">
  <title>FAQ</title>
</head>


<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=le_site_du_sport;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$req3=$bdd->query('SELECT * from faq');
	echo 'FAQ';
	
		while ($donnee= $req3->fetch()){
					echo'<div id="source" onclick="affiche_contenu8()">';
					echo'<p><strong>'. htmlspecialchars($donnee['question']) . '</strong> :   </p>';  
					echo'</div>';
					echo'<div id="r" style="display:none;">';
					echo'<p>'. htmlspecialchars($donnee['reponse']) . '    </p>'; 
					echo'</div> ';
				
									
		}
		$req3->closeCursor();?>
 
	 <div id="source" onclick="affiche_contenu6()">
            <p>Comment trouver un évènement ?</p>
            </div> 
            <div id="a" style="display:none;">
                <em>Pour trouver un évènement, vous pouvez effectuer une recherche rapide en 
                    renseignant trois critères (type d'évènement, adresse, association) dans 
                    la page d'accueil. Vous avez alors une page qui s'ouvre avec une première
                    sélection d'évènements correspondant aux critères demandés.
                    Si vous voulez effectuer une recherche plus précisé d'évènements, il faut
                    compléter le formulaire de recherche de la page trouver.</em>   
            </div> 
 <script type="text/javascript">
 function affiche_contenu8() {
      var r = document.getElementById('r');
      if(r.style.display != '') {
        r.style.display = '';
      } else {
        r.style.display = 'none';
      }
    }
	
	function affiche_contenu6() {
      var r = document.getElementById('a');
      if(r.style.display != '') {
        r.style.display = '';
      } else {
        r.style.display = 'none';
      }
    }
	
	
	 </script>
	 </div>
</html>