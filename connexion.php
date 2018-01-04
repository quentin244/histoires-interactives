<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Histoire Interactive</title>
<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
</head>
<body>

		<h2>Connexion</h2>
				<form method="post" action="verificationconnexion.php">
   <p>
		<label for="email_client">Email:</label>
       <input type="text" name="email_client" id="email_client" />
	   
       <br />
       <label for="mdp_client">Mot de passe :</label>
       <input type="password" name="mdp_client" id="mdp_client" />
	   
	  <br/> 
	  <input type="submit" value="connexion" />
   </p>
    <p>
    <br>Si vous n'avez pas encore de compte cliquez ici :<br />
		<a href="inscription.php">S'inscrire</a>
		</p>
</form>
</body>
</html>