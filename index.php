<?php
//Include required PHPMailer files
	require 'C:/xampp/htdocs/freshshop-master/PHPMailer/includes/PHPMailer.php';
	require 'C:/xampp/htdocs/freshshop-master/PHPMailer/includes/SMTP.php';
	require 'C:/xampp/htdocs/freshshop-master/PHPMailer/includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;






// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projetweb";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Save data to database
$nom = $_POST['nom'];
$adresseEmail = $_POST['adresseEmail'];
$subject = $_POST['subject'];
$sql = "INSERT INTO assistant (nom, adresseEmail, subject) VALUES ('$nom', '$adresseEmail', '$subject')";
if ($conn->query($sql) === TRUE) {
 // echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$description = $_POST['description'];
$dateCreation = $_POST['dateCreation'];
$sql = "INSERT INTO probleme (description,dateCreation) VALUES ('$description', '$dateCreation')";
if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}







//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "rayen.trabelsi@esprit.tn";
//Set gmail password
	$mail->Password = "ktrqdkqvqedsxvsc";
//Email subject
	$mail->Subject = "message envoyee";
//Set sender email
	$mail->setFrom('rayen.trabelsi@esprit.tn');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "<h1>Reclamation envoyee</h1></br><p>Nous vous répondrons dans quelques minutes</p>";
//Add recipient
	$mail->addAddress('rayen.trabelsi@esprit.tn');
//Finally send email
	if ( $mail->send() ) {
		//echo "Email Sent..!";
		
	}else{
		echo "Message could not be sent. Mailer Error: ";
	}
//Closing smtp connection
	$mail->smtpClose();