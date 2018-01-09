<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>CreerHistoire</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>

<?php

$_titre=$_POST["Titre"];
$_back = $_POST['background']
$_img=$_POST["img"];
$_text=$_POST["text"];
$_fin=$_POST["fin"];
$_choix = $_POST['choix'];
$_dir = $_POST["direction"];

try {
	$dbh = new PDO('mysql:host=localhost;dbname=histoire_interactive', 'root', 'root');
} 
catch (PDOException $e) {
	die('Erreur : ' . $e->getMessage());
}

$req = $dbh->prepare('INSERT INTO histoire(Titre) Value(?)');
	$req->bindparam(1,$_titre,PDO::PARAM_STR);
	$req->execute();

foreach($_back as $scene => $n){
	$req = $dbh->prepare('INSERT INTO Page(Histoire, Img, Text, Fin) Value(?,?,?,?)');
		$req->bindparam(1,$scene,PDO::PARAM_STR);
		$req->bindparam(2,$img[$scene],PDO::PARAM_STR);
		$req->bindparam(3,$text[$scene],PDO::PARAM_STR);
		$req->bindparam(4,$fin[$scene],PDO::PARAM_INT);
	foreach($_choix[$scene] as $choice => $n){
	$req = $dbh->prepare('INSERT INTO Choix(IdPageProposition, TextProposition) Value(?,?)');
		$req->bindparam(1,$direction[$choice],PDO::INT);
		$req->bindparam(2,$choice,PDO::PARAM_STR);
	}
	
}

?>


