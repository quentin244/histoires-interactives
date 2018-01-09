<?php

$nom_client = $_POST['nom_client'];
$prenom_client = $_POST['prenom_client'];
$mdp_client = $_POST['mdp_client'];
$email_client = $_POST['Email_Client'];
$telephone_client = $_POST['telephone_client'];

try
{
<<<<<<< HEAD
	$bdd = new PDO('mysql:host=localhost;dbname=histoire_interactive;charset=utf8', 'root', 'root');
=======
	$bdd = new PDO('mysql:host=localhost;dbname=histoire_interactive;charset=utf8', 'root', '');
>>>>>>> 5b748d03cda71fa9a384e4afb64aeac950bd8599
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
 
 try
    { 
$req = $bdd->prepare("INSERT INTO utilisateurs(Nom, Prenom, Mdp, Email, Telephone) VALUES(?,?,?,?,?)");
$req->bindparam(1,$nom_client,PDO::PARAM_STR);
$req->bindparam(2,$prenom_client,PDO::PARAM_STR);
$req->bindparam(3,$mdp_client,PDO::PARAM_STR);
$req->bindparam(4,$email_client,PDO::PARAM_STR);
$req->bindparam(5,$telephone_client,PDO::PARAM_INT);
$req->execute();

	if($req->rowCount()>0)
	{
		echo 'Votre profil a bien ete enregistre';
		header ("Location: connexion.php");
	}
	else{
		print_r($req->errorInfo());
	}
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}

?>
