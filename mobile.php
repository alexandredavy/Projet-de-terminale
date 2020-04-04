<?php
if($_GET["identifient"] and $_GET["pass"])
{
	$bdd = new PDO('mysql:host=localhost;dbname=access;charset=utf8', 'root', 'alexandre');
	$req = $bdd->prepare("SELECT * FROM administrateurs WHERE identifient=?");
	$req->execute(array($_GET["identifient"]));
	$result = $req->fetch();
	if(isset($result["identifient"]) and $result["pass"] == $_GET["pass"] )
	{
		if($_GET["type"]=="ajtuser"and $_GET["nom"] and $_GET["prenom"] and $_GET["rfid"] and $_GET["minheure"] and $_GET["maxheure"])
		{
			$bdd = new PDO('mysql:host=localhost;dbname=access;charset=utf8', 'root', 'alexandre');
			$req = $bdd->prepare("INSERT INTO persautorise (nom,prenom,rfid,minheure,maxheure) VALUES(?,?,?,?,?)");
			$req->execute(array($_GET["nom"],$_GET["prenom"],$_GET["rfid"],$_GET["minheure"],$_GET["maxheure"]));
		}
		elseif($_GET["type"]=="supuser" and $_GET["prenom"])
		{
			$bdd = new PDO('mysql:host=localhost;dbname=access;charset=utf8', 'root', 'alexandre');
			$req = $bdd->prepare("DELETE FROM persautorise WHERE prenom = ?");
			$req->execute(array($_GET["prenom"]));
		}
	}
}


?>