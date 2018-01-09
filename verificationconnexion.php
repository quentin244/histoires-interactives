
    <?php
$email_client=$_POST['email_client'];
$mdp_client=$_POST['mdp_client'];
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=histoire_interactive;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
 
$req = $bdd->prepare('SELECT mdp FROM utilisateurs WHERE email = ? AND mdp = ?');
$req->bindparam(1,$email_client,PDO::PARAM_STR);
$req->bindparam(2,$mdp_client,PDO::PARAM_STR);
$req->execute();
$resultat=$req->rowCount();
if ($resultat==1)
{
	//session_start();
	//$_SESSION['email'] = $email_client;
	
    echo 'Vous êtes connecté !';
}
else
{
	echo 'Mauvais identifiant ou mot de passe !';   
}

?>

<p>Vous allez etre redirige vers la page d'accueil</p>
<meta http-equiv="Refresh" content="5;url=index.php"> 
