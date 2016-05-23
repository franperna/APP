<!DOCTYPE html> 
<html lang="fr"> 
<head> 
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<title>[GoogleMaps API V3] Insertion d'une Carte</title> 
<style type="text/css"> 
#div_carte { 
height : 600px; /* IMPERATIF */ 
width : 600px; 
margin : auto; 
border : 1px solid #888; 
} 
</style> 
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript"> 
function initCarte(){ 
// création de la carte 
var oMap = new google.maps.Map( document.getElementById( 'div_carte'),{ 
'center' : new google.maps.LatLng( 46.80, 1.70), 
'zoom' : 6, 
'mapTypeId' : google.maps.MapTypeId.ROADMAP 
}); 
} 
// init lorsque la page est chargée 
google.maps.event.addDomListener( window, 'load', initCarte); 
</script> 
</head> 
<body> 
<h1>Titre de la carte</h1> 
<div id="div_carte"></div>