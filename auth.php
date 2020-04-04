<?php
if(isset($_GET["rfid"]))
{
	$bdd = new PDO('mysql:host=localhost;dbname=access;charset=utf8', 'root', 'alexandre');
	$req = $bdd->prepare("SELECT * FROM persautorise WHERE rfid=?");
	$req->execute(array($_GET["rfid"]));
	$info = $req->fetch();
	$heure = date('H');
	$heure = $heure+date('i')/100;
	if (isset($info["rfid"]) and $heure<=$info["maxheure"] and $heure>=$info["minheure"])
	{
		echo "ok";
		$req->closeCursor();
		$req = $bdd->prepare("INSERT INTO listouverture (nom,prenom,rfid,moment) VALUES(?,?,?,now())");
		$req->execute(array($info["nom"],$info["prenom"],$info["rfid"]));
	}
	else
	{
		echo "no";
	}
}
else
{
	echo "no";
}


?>