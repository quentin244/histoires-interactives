<?php
$Nom = $_POST['nom'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$messageR = $_POST['message'];

$to  = 'quentin.joubert28@gmail.com' . ', '; // notez la virgule
$to .= 'alagat@laposte.net';
	 
$subject = 'Prise Contact HistoireInteractive';

$message = $messageR;

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'To: Quentin <quentin.joubert28@gmail.com>, Antonin <alagat@laposte.net>' . "\r\n";
$headers .= "From: $email" . "\r\n";

mail($to, $subject, $message, $headers);
?>