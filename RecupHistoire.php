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
	$ArraySceneTout = Array();
	$TabHist = $dbh->prepare('SELECT * FROM histoire');
	$TabHist->execute();
	$resultHist = $TabHist->fetchAll();
 
	if ( count($resultHist) ) { 
		foreach($resultHist as $rowHist) {
			$TitreHist = $rowHist['Titre'];
			
			$TabPage = $dbh->prepare('SELECT * FROM page Where Histoire = :Id');
			$TabPage->bindParam(':Id', $rowHist['Id'], PDO::PARAM_INT);
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
						$ArrayScene = Array('Id'=>$rowPage['Id'], 'urlimage'=>$rowPage['Image'], 'text'=> utf8_encode($rowPage['Texte']), 'fin'=>$rowPage['Fin']);
					}
					array_push($ArraySceneTout, $ArrayScene);
				} 
			}
			else {
				echo "Aucune Page pour cette histoire.";
			}
			$ArrayHistoire = Array('title'=> $TitreHist ,'scenes' =>$ArraySceneTout);
			$SceneJson = (json_encode($ArrayHistoire));
			file_put_contents("$TitreHist.json", $SceneJson."\n", FILE_APPEND);
		}
	}
	else{
		echo "Aucune histoire.";
	}
} 
catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}
?>