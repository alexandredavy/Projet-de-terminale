<?php
session_start();

if(isset($_SESSION["identifient"]))
{
	header("Location: controle.php");
}
else
{
	header("Location: connexion.php");
}


?>