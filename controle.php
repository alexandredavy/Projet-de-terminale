<?php
session_start();
if(!isset($_SESSION["identifient"]))
{
	header("Location: connexion.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>controle</title>
</head>
<body>
	<?php
	echo "identifient :".$_SESSION["identifient"];
	if(isset($_GET["erreur"]))
	{
		if($_GET["erreur"]="nonremplit")
		{
			echo "<p><strong>il faut remplir tous les champs</strong></p>";
		}
	}
	?>
	<p><strong>ajouter un administrateur :</strong></p>
	<form action="ajtadmin.php" method="get">
		<p><label>nouveaux identifient :</label><input type="text" name="identifient"></p>
		<p><label>nouveaux mot de pass :</label><input type="text" name="pass"></p>
		<p><input type="submit" name="ajtadmin" value="envoyer"></p>
	</form>
	<p><strong>ajouter un utilisateur :</strong></p>
	<form action="ajtutilisateur.php" method="get">
		<p><label>nom :</label><input type="text" name="nom"></p>
		<p><label>prénom :</label><input type="text" name="prenom"></p>
		<p><label>rfid :</label><input type="text" name="rfid"></p>
		<p><label>heure minimal :</label><input type="number" name="minheure" min="0" max="23"></p>
		<p><label>heure maximal :</label><input type="number" name="maxheure" min="1" max="24"></p>
		<p><input type="submit" name="ajtutilisateur" value="envoyer"></p>
	</form>
	<p><strong>suprimer un utilisateur :</strong></p>
	<form action="suputilisateur.php" method="get">
		<p><label>prénom :</label><input type="text" name="prenom"></p>
		<p><input type="submit" name="suputilisateur" value="envoyer"></p>
	</form>
	<p><strong>liste des utilisateurs :</strong></p>
	<?php
	$bdd = new PDO('mysql:host=localhost;dbname=access;charset=utf8', 'root', 'alexandre');
	$result = $bdd->query("SELECT * FROM persautorise");
	try
	{
		while($info = $result->fetch())
		{
			echo "<p>prénom : ".$info["prenom"]." nom : ".$info["nom"]." rfid : ".$info["rfid"]." heure minimal : ".$info["minheure"]." heure maximal : ".$info["maxheure"]."</p>";
		}
	}
	catch (Exception $e)
	{
		echo "aucun utilisateur";
	}
	
	?>
	<p><strong>liste des entrée :</strong></p>
	<?php
	$result->closeCursor();
	$result = $bdd->query("SELECT prenom, nom, rfid, DAY(moment) AS jour, MONTH(moment) AS mois, YEAR(moment) AS annee, HOUR(moment) AS heure, MINUTE(moment) AS minute FROM listouverture ORDER BY id DESC");
	try
	{
		while($info = $result->fetch())
		{
			echo "<p>".$info["prenom"]." ".$info["nom"]." qui a le numéro rfid : ".$info["rfid"]." est entré à ".$info["heure"]." heure et ".$info["minute"]." minute le ".$info["jour"]."/".$info["mois"]."/".$info["annee"]."</p>";
		}
	}
	catch(Exception $e)
	{
		echo "aucune liste";
	}
	?>
	<form action="viderlist.php?vider=true" method="get">
		<input type="submit" value="suprimer la dernière ouverture">
	</form>
</body>
</html>