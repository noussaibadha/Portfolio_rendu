<?php

include 'db.php';


// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

$nom = $_POST['nom'];
$sujet = $_POST['sujet'];
$email = $_POST['email'];
$message = $_POST['message'];

$message = "Email : ".$email."\n"." message : ".$message;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require'PHPMailer/src/Exception.php';
require'PHPMailer/src/PHPMailer.php';
require'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);


try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'noussaiba.dha@gmail.com';                     //SMTP username
    $mail->Password   = 'xavg wcnk wgyx mblv';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom('from@example.com', 'Contact Portfolio');
    $mail->addAddress('noussaiba.dha@gmail.com');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $sujet;
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
} catch (Exception $error) {
    echo $error;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $sujet = $_POST["sujet"];
    $message = $_POST["message"];

    $sql = "INSERT INTO contact (nom, email, sujet, message) VALUES ('$nom', '$email', '$sujet', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Les données ont été enregistrées avec succès dans la base de données.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}
?>