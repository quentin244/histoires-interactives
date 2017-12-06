<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Mad Maxi Jack</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>

<?php
$dsn = 'mysql:dbname=histoire_interactive;host=localhost';
$user = 'root';
$password = '';

try {
	$dbh = new PDO($dsn, $user, $password);
}

catch (PDOException $e) {
	echo('Erreur: '. $e->getMessage());
}
$stmt = $dbh->query('SELECT * FROM page');

?>
<body id = "MadMaxiJack" onload='scene(0)'>

	<div id="Mad_Maxi-Jack">

		<?php
		$i = 0;
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

			?>
			<div class="Scene" id=<?php echo $i?>> <!--page 1-->
				<img src="<?php echo $row['Image']?>"/>

				<p><?php echo $row['Texte']?></p>

				<?php
				$stmt2 = $dbh->query("SELECT * FROM choix where IdPageProposition = $i ");

				?> 
				<input class = 'bouton' type='button' value='suivant' OnClick='scene(<?php echo $i + 1 ?>)'>
				<?php

				while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
					?>

					<input class = 'bouton' type='button' value=<?php echo $row2['TextProposition']?> OnClick= 'scene(<?php echo $row2['IdPagePropose'] ?>)'>
					<?php
				}
				?> 
				<?php
				$i = $i+1;
				echo "</div>";
			}
			?>
		</div>
	</div>
</body>
</html>