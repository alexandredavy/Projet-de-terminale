<?php
session_start();

if($_POST["pass"] and $_POST["identifient"]) # vérifit si l'utilisateur à remplit les deux champs
{
	$bdd = new PDO('mysql:host=localhost;dbname=access;charset=utf8', 'root', 'alexandre');#connection à la base de données
	$req = $bdd->prepare("SELECT * FROM administrateurs WHERE identifient=?");#prepare le requête sql pour trouver l'utilisateur
	$req->execute(array($_POST["identifient"]));#envoie la requête avec l'identifient recupèrer
	$result = $req->fetch();#met la premier valeur recupèrer dans la variable
	if(isset($result["identifient"]))#verifie que l'utilisateur existe 
	{
		if($_POST['pass'] == $result['pass'])#verifie que mot de pass correspond
		{
			$_SESSION["identifient"] = $_POST["identifient"];#enregistre l'identifient
			$_SESSION["pass"] = password_hash($_POST["pass"], PASSWORD_DEFAULT);#enregistre le mot de pass
			header("Location: controle.php");
		}
		else
		{
			header("Location: connexion.php?erreur=pass");
		}
	}
	else
	{
		header("Location: connexion.php?erreur=utilisateur");
	}

}
else
{
	header("Location: connexion.php?erreur=nonremplit");
}

?>