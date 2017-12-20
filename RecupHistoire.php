<?php
$title = $_GET["titreHist"];
try {
	$dbh = new PDO('mysql:host=localhost;dbname=histoire_interactive', 'root', '');
} 
catch (PDOException $e) {
	die('Erreur : ' . $e->getMessage());
}

try {
	$TabHist = $dbh->prepare('SELECT * FROM histoire Where Titre = :Titre');
	$TabHist->bindParam(':Titre', $title, PDO::PARAM_STR);
	$TabHist->execute();
	$resultHist = $TabHist->fetchAll();
 
		foreach($resultHist as $rowHist) {
			$ArraySceneTout = Array();
			$TitreHist = $rowHist['Titre'];
			
			$TabPage = $dbh->prepare('SELECT * FROM page Where Histoire = :Id');
			$TabPage->bindParam(':Id', $rowHist['Id'], PDO::PARAM_INT);
			$TabPage->execute();
			$resultPage = $TabPage->fetchAll();
	 
			if ( count($resultPage) ) { 
				foreach($resultPage as $rowPage) {
					$ArrayChoiceTout = Array();
			
					$TabChoix = $dbh->prepare('SELECT * FROM Choix Where IdPageProposition = :Id');
					$TabChoix->bindParam(':Id', $rowPage['Id'], PDO::PARAM_INT);
					$TabChoix->execute();
					$resultChoix = $TabChoix->fetchAll();
				
					if ( count($resultChoix) ) { 
						foreach($resultChoix as $rowChoix) {
							$ArrayChoice = Array('text' =>utf8_encode($rowChoix['TextProposition']), 'output' =>$rowChoix['IdPagePropose']);
							array_push($ArrayChoiceTout, $ArrayChoice);
						}
						$ArrayScene = Array('Id'=>$rowPage['Id'], 'urlimage'=>$rowPage['Image'], 'text'=>utf8_encode($rowPage['Texte']), 'choices' => $ArrayChoiceTout, 'fin'=>$rowPage['Fin']);
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
			$SceneJson = json_encode($ArrayHistoire);
			echo $SceneJson;
		}
}
catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}
?>