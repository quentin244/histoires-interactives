<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Histoire Interactive</title>
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<body>
<h2>Inscription</h2>
<form method="post" action="traitementInscription.php">
   <p>
		<label for="nom_client"> Nom :</label>
       <input type="text" name="nom_client" id="nom_client" />

	   <br />
       <label for="prenom_client"> Prénom :</label>
       <input type="text" name="prenom_client" id="prenom_client" />
	   
       <br />
       <label for="mdp_client"> Mot de passe :</label>
       <input type="Password" name="mdp_client" id="mdp_client" />
	   
	   	<br />
       <label for="Email_Client"> Email :</label>
       <input type="Email_Client" name="Email_Client" id="Email_Client" />
	   
	   	<br />
       <label for="telephone_client"> Numéro de téléphone :</label>
       <input type="telephone_client" name="telephone_client" id="telephone_client" />
       
	 <p id="buttons">
  <input type="submit" value="Envoyer" />
  <input type="reset" value="Recommencer" />
</p>
    
    <p>
   Si vous êtes déjà inscrit cliquez ici :<br />
		<a href="connexion.php">Se connecter</a>
		</p>
		
</body>
</html>