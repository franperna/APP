<?php 

 
if(isset($_POST['abonné'],$_POST['désabonné'],$_POST['mois']))
{
	$a= $_POST['désabonné']/100;

	for($i=0,$i<$_POST['mois'],$i++)
		{
			$b=$_POST['abonné']*$a;
		}		    
	echo $b;
}

if(isset($_POST['abonné'] ,$_POST['désabonné'],$_POST['abonnéf']))
{
	$mois=($_POST['abonné']*($_POST['désabonné']/100))-($_POST['abonnéf']) ;
	echo $mois;
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
<input type ="text" name="abonné" id="abonné"/>
<br/>
<br/>
<label for="désabonné"> %de désabonné par mois:</label>
<input type ="désabonné" name="désabonné" id="désabonné"/>
<br/>
<label for="mois"> Mois:</label>
<input type ="mois" name="mois" id="mois"/>
<br/>
<label for="abonnéf"> Nombre abonné final:</label>
<input type ="abonnéf" name="abonnéf" id="abonnéf"/>
<br/>
<input type="submit" value="Envoyer"/>
</form>

</body>
</html>