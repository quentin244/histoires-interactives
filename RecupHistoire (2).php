<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Mad Maxi Jack</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>

<?php

try {
  $dbh = new PDO('mysql:host=localhost;dbname=histoire_interactive', 'root', '');
} 
catch (PDOException $e) {
  die('Erreur : ' . $e->getMessage());
}

try {
  $TabPage = $dbh->prepare('SELECT * FROM page');
  $TabPage->execute();
 
  $resultPage = $TabPage->fetchAll();
 
	if ( count($resultPage) ) { 
		foreach($resultPage as $rowPage) {
	  
			$TabChoix = $dbh->prepare('SELECT * FROM Choix Where IdPageProposition = :Id');
			$TabChoix->bindParam(':Id', $rowPage['Id'], PDO::PARAM_INT);
			$TabChoix->execute();
 
			$resultChoix = $TabChoix->fetchAll();
			
			if ( count($resultChoix) ) { 
				foreach($resultChoix as $rowChoix) {
					$ArrayChoice = Array('text' =>utf8_encode($rowChoix['TextProposition']), 'output' =>$rowChoix['IdPagePropose']);
					$ArrayScene = Array('Id'=>$rowPage['Id'], 'urlimage'=>$rowPage['Image'], 'text'=>utf8_encode($rowPage['Texte']), 'choices' => $ArrayChoice, 'fin'=>$rowPage['Fin']);
				}
			}
			else{
			$ArrayScene = Array('Id'=>$rowPage['Id'], 'urlimage'=>$rowPage['Image'], 'text'=>utf8_encode($rowPage['Texte']), 'fin'=>$rowPage['Fin']);
			}
			var_dump($ArrayScene);
			print_r(json_encode($ArrayScene));
			echo("</br>");
		} 
	}
   else {
	   echo "Aucune Page pour cete histoire.";
  }
} 
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>