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
		$req->closeCursor();
		$req = $bdd->query("DELETE FROM listouverture WHERE id=(SELECT Min(id) FROM listouverture)");
		header("Location: controle.php");
	}
	else
	{
		header("Location: connexion.php?erreur=utilisateur");
	}
}
?>