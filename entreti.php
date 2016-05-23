<?php 

 
if(isset($_POST['abonné']),isset($_POST['désabonné']),isset($_POST['mois']))
{
	$d= $_POST['désabonné']/100;
	$m = $_POST['mois'];
	$a = $_POST['abonné'];

	for ($nombre_mois = 1 ; $nombre_mois <= $m ; $nombre_mois++)
		{
			$a = $a - ($a * $d);
		}		    
	 echo($a);
}

elseif(isset($_POST['abonné']),isset($_POST['désabonné']),isset($_POST['abonnéf']))
{
	$x= $_POST['désabonné']/100;
	$v = $_POST['abonnéf'];
	$w = $_POST['abonné'];
    $mois=0;
	while($w != $v)
		{
			$w = $w - ($w * $x);
			$mois++;
		}
	echo($mois);
} 
?>






<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
</head>

<body>
<form  method ="post" enctype="multipart/form-data">
<label for="abonné"> Nombre d'abonné:</label>
<input type ="number" name="abonné" id="abonné"/>
<br/>
<br/>
<label for="désabonné"> %de désabonné par mois:</label>
<input type ="number" name="désabonné" id="désabonné"/>
<br/>
<label for="mois"> Mois:</label>
<input type ="number" name="mois" id="mois"/>
<br/>
<label for="abonnéf"> Nombre abonné final:</label>
<input type ="number" name="abonnéf" id="abonnéf"/>
<br/>
<input type="submit" value="Envoyer"/>
</form>

</body>
</html>