<?php
require_once "includes/dbh.inc.php";

$query =   "SELECT email FROM afspraken ORDER BY id DESC LIMIT 1";

$result = mysqli_query($conn, $query)
or die('Error' .mysqli_error($conn).'<br>query:'. $query);

$email = mysqli_fetch_assoc($result);

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

// Load Composer's autoloader
require_once "vendor/autoload.php";

$mail = new PHPMailer;

$mail->SMTPDebug    = 3;                                //Enable SMTP debugging.
$mail->isSMTP();                                        //Set PHPMailer to use SMTP.
$mail->Host         = "smtp.gmail.com";                 //Set SMTP host name
$mail->SMTPAuth     = true;                             //Set this to true if SMTP host requires authentication to send email
$mail->Username     = "Donovan.laldjising@gmail.com";   //Provide username and password
$mail->Password     = "Wolfling84213579";
$mail->SMTPSecure   = "tls";                            //If SMTP requires TLS encryption then set it
$mail->Port         = 587;                              //Set TCP port to connect to

$mail->setFrom("Donovan.laldjising@gmail.com", "Donovan Laldjising");
$mail->addAddress("donovan.laldjising@gmail.com", "Don Don");
$mail->addAddress($email['email']);

$mail->isHTML(true);
$mail->Subject = "Reservering Cube";
$mail->Body = "<i>Reservering bij Cube is gemaakt</i>";
$mail->AltBody = "This is the plain text version of the email content";

if($mail->send())
    {
        echo "Message has been sent successfully";
        header("Location: reserveren.php");
        die();
    }
else
    {echo "Mailer Error: " . $mail->ErrorInfo;}

