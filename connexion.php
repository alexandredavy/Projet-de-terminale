<!DOCTYPE html>
<html>
<head>
	<title>connexion</title>
</head>
<body>
	<?php
	# affiche les erreurs qu'il y a eu lors de la connexion
	if(isset($_GET["erreur"]))
	{
		if($_GET["erreur"] == "nonremplit")#affiche que tous les champ n'ont pas était remplit
		{
			echo "<p><strong>il faut remplir tous les champs</strong></p>";
		}
		elseif($_GET["erreur"] == "utilisateur")#affiche que l'utilisateur n'existe pas
		{
			echo "<p><strong>votre identifiant est incorrect</strong></p>";	
		}
		elseif ($_GET["erreur"] == "pass")#affiche que le mot de pass est incorrect
		{
			echo "<p><strong>votre mot de pass est incorrect</strong></p>";
		}
	}
	?>
	<form action="testconnexion.php" method="post">
		<p><label>identifiant :</label><input type="text" name="identifient"></p>
		<p><label>mot de pass :</label><input type="password" name="pass"></p>
		<p><input type="submit" value="envoyer"></p>
	</form>
</body>
</html>