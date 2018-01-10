<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>CreerHistoire</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>

<?php
$id = $_POST["id"];
$titre=$_POST["Titre"];
$back = $_POST["background"];
$img = $_POST["img"];
$text=$_POST["text"];
$fin=$_POST["fin"];

$choix1 = $_POST["choix1"];
$dir1 = ($_POST["direction1"]);
$choix2 = $_POST["choix2"];
$dir2 = $_POST["direction2"];
$choix3 = $_POST["choix3"];
$dir3 = $_POST["direction3"];
$choix4 = $_POST["choix4"];
$dir4 = $_POST["direction4"];
$choix5 = $_POST["choix5"];
$dir5 = $_POST["direction5"];

try {
	$dbh = new PDO('mysql:host=localhost;dbname=histoire_interactive', 'root', 'root');
} 
catch (PDOException $e) {
	die('Erreur : ' . $e->getMessage());
}

$reqHist = $dbh->prepare('INSERT INTO histoire(Titre) Value(?)');
$reqHist->bindparam(1,$titre,PDO::PARAM_STR);
$reqHist->execute();
print_r($reqHist->errorInfo());
$TabHist = $dbh->prepare('SELECT Id FROM histoire Where Titre = :Titre');
$TabHist->bindParam(':Titre', $titre, PDO::PARAM_STR);
$TabHist->execute();
$IdHist = $TabHist->fetchAll();

foreach ($id as $Key => $n){
	$id = $n-1;
	$_img = $img[$Key];
	$_text = $text[$Key];
	
	if($dir1[$Key] ==''){
		$_fin = 1;
	}
	else{
		$_fin = 0;
	}
	
	$reqPage = $dbh->prepare("INSERT INTO page(Id, Histoire, Image, Texte, Fin) VALUES(?,?,?,?,?)");
	$reqPage->bindparam(1,$id,PDO::PARAM_INT);
	$reqPage->bindparam(2,$IdHist[0][0],PDO::PARAM_STR);
	$reqPage->bindparam(3,$_img,PDO::PARAM_STR);
	$reqPage->bindparam(4,$_text,PDO::PARAM_STR);
	$reqPage->bindparam(5,$_fin,PDO::PARAM_INT);
	$reqPage->execute();
	print_r($reqPage->errorInfo());
	
	$_choix1 = $choix1[$Key];
	$_dir1 = intval($dir1[$Key]) - 1;
	$_choix2 = $choix2[$Key];
	$_dir2 = intval($dir2[$Key]) - 1;
	$_choix3 = $choix3[$Key];
	$_dir3 = intval($dir3[$Key]) - 1;
	$_choix4 = $choix4[$Key];
	$_dir4 = intval($dir4[$Key]) -1;
	$_choix5 = $choix5[$Key];
	$_dir5 = intval($dir5[$Key]) -1;
	
	if($_dir1 > 0){
	$reqChoix1 = $dbh->prepare('INSERT INTO Choix(IdPageProposition, TextProposition, IdPagePropose, Histoire) Value(?,?,?,?)');
	$reqChoix1->bindparam(1,$id,PDO::PARAM_INT);
	$reqChoix1->bindparam(2,$_choix1,PDO::PARAM_STR);
	$reqChoix1->bindparam(3,$_dir1,PDO::PARAM_INT);
	$reqChoix1->bindparam(4,$IdHist[0][0],PDO::PARAM_STR);
	$reqChoix1->execute();
	print_r($reqChoix1->errorInfo());
	}
	if($_dir2 > 0){
	$reqChoix2 = $dbh->prepare('INSERT INTO Choix(IdPageProposition, TextProposition, IdPagePropose, Histoire) Value(?,?,?,?)');
	$reqChoix2->bindparam(1,$id,PDO::PARAM_INT);
	$reqChoix2->bindparam(2,$_choix2,PDO::PARAM_STR);
	$reqChoix2->bindparam(3,$_dir2,PDO::PARAM_INT);
	$reqChoix2->bindparam(4,$IdHist[0][0],PDO::PARAM_STR);
	$reqChoix2->execute();
	print_r($reqChoix2->errorInfo());
	}
	if($_dir3 > 0){
	$reqChoix3 = $dbh->prepare('INSERT INTO Choix(IdPageProposition, TextProposition, IdPagePropose, Histoire) Value(?,?,?,?)');
	$reqChoix3->bindparam(1,$id,PDO::PARAM_INT);
	$reqChoix3->bindparam(2,$_choix3,PDO::PARAM_STR);
	$reqChoix3->bindparam(3,$_dir3,PDO::PARAM_INT);
	$reqChoix3->bindparam(4,$IdHist[0][0],PDO::PARAM_STR);
	$reqChoix3->execute();
	print_r($reqChoix3->errorInfo());
	}
	if($_dir4 > 0){
	$reqChoix4 = $dbh->prepare('INSERT INTO Choix(IdPageProposition, TextProposition, IdPagePropose, Histoire) Value(?,?,?,?)');
	$reqChoix4->bindparam(1,$id,PDO::PARAM_INT);
	$reqChoix4->bindparam(2,$_choix4,PDO::PARAM_STR);
	$reqChoix4->bindparam(3,$_dir4,PDO::PARAM_INT);
	$reqChoix4->bindparam(4,$IdHist[0][0],PDO::PARAM_STR);
	$reqChoix4->execute();
	print_r($reqChoix4->errorInfo());
	}
	if($_dir5 > 0){
	$reqChoix5 = $dbh->prepare('INSERT INTO Choix(IdPageProposition, TextProposition, IdPagePropose, Histoire) Value(?,?,?,?)');
	$reqChoix5->bindparam(1,$id,PDO::PARAM_INT);
	$reqChoix5->bindparam(2,$_choix5,PDO::PARAM_STR);
	$reqChoix5->bindparam(3,$_dir5,PDO::PARAM_INT);
	$reqChoix5->bindparam(4,$IdHist[0][0],PDO::PARAM_STR);
	$reqChoix5->execute();
	print_r($reqChoix5->errorInfo());
	}	
}
	
?>


