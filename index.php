<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Histoire Interactive</title>
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<body id="Index">
	<div id="menu">
		<ul>
			<li>
				<a href="connexion.php">connexion</a>
            </li>
        </ul>
    </div>

<div id="Titre"><H1>Bienvenue dans Xarsaroth!!!</H1></div>

<div id="Presentation"><p>Noble aventurier en manque d'aventure, pauvre survivant isolé en manque de nourriture, prêts à affronter ce que leur réserve la nature, soyez les bienvenues!</br>
Ici vous trouverez action, suspens, gloire... mort et désolation.</br>
Choisissez imédiatement l'un des scénarios ci-dessous et embarquez dans une histoire où chacun de vos choix feront la différence entre une fin heureuse et... une fin tout court.<p></div>

<div id="ChoixHistoire">
<?php
try {
	$dbh = new PDO('mysql:host=localhost;dbname=histoire_interactive', 'root', 'root');
} 
catch (PDOException $e) {
	die('Erreur : ' . $e->getMessage());
}

try {
	$TabHist = $dbh->prepare('SELECT * FROM histoire');
	$TabHist->execute();
	$resultHist = $TabHist->fetchAll();
 
	if ( count($resultHist) ) { 
		foreach($resultHist as $rowHist) {
?>
		<a class="Histoire" id ="<?php echo $rowHist['Titre'];?>" onclick="ClickBouton(this.id)"><?php echo $rowHist['Titre'];?></a>
<?php
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
</div>

<a class="Histoire" href="CreerHistoire.html">Créer sa propre histoire</a>


<a id="LienContact" href="#" onclick="AfficherContact()" >Contactez-Nous</a>

<div id = "contact">

<p>Formulaire de contact</p>

<form name="Contact" id="contactForm" method="post" action="TraitContact.php">

<label>Nom</label>
<input type="text" placeholder="Nom" id="nom" name="nom" title = "nom" required data-validation-required-message="Entrer votre nom.">
</br>
<label>Addresse email</label>
<input type="email" placeholder="Addresse email" id="email" name="email" title = "email" required data-validation-required-message="Entrer votre addresse email.">
</br>
<label>Numeros Telephone</label>
<input type="tel" placeholder="Numero Telephone" id="tel" name="tel" title="tel" required data-validation-required-message="Entrer votre numeros de telephone.">
</br>
<label>Message</label>
<textarea rows="5" placeholder="Message" id="message" name ="message" title="message" required data-validation-required-message="Entrer un message."></textarea>
</br>
<button type="submit" id="envoyer" title = "Envoyer">Envoyer</button>
</form>

</div>
</body>
</html>
