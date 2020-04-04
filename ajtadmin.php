<?php
session_start();
if(!isset($_SESSION["identifient"]))
{
	header("Location: connexion.php");
}
$bdd = new PDO('mysql:host=localhost;dbname=access;charset=utf8', 'root', 'alexandre');
$req = $bdd->prepare("SELECT * FROM administrateurs WHERE identifient=?");
$req->execute(array($_SESSION["identifient"]));
$result = $req->fetch();

if(isset($result["identifient"]))
{
	if(password_verify($result["pass"],$_SESSION["pass"]))
	{
		if($_GET["identifient"] and $_GET["pass"])
		{
			$req->closeCursor();
			$req = $bdd->prepare("INSERT INTO administrateurs (identifient,pass) VALUES(?,?)");
			$req->execute(array($_GET["identifient"],$_GET["pass"]));
			header("Location: controle.php");
		}
		else
		{
			header("Location: controle.php?erreur=nonremplit");
		}
	}
	else
	{
		header("Location: connexion.php?erreur=utilisateur");
	}
}
?>