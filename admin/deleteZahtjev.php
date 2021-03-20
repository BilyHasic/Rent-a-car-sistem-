<?php
// Start a Session
if (!session_id()) @session_start();
// Instantiate the class


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../includes/PHPmailer/src/Exception.php';
require '../includes/PHPmailer/src/PHPMailer.php';
require '../includes/PHPmailer/src/SMTP.php';
require '../connectDB.php';

if(isset($_POST['delete']))
{
  $email = $_POST["email"];
  $SelectFromUser = mysqli_query ($db,"SELECT * FROM request WHERE email = '$email'");
$id = $_POST['delete_id'];
    


$sql = "DELETE FROM request WHERE ID = $id";
$sql_run = mysqli_query($db,$sql);

 // Instantiation and passing `true` enables exceptions
 $mail = new PHPMailer(true);

 try {
     //Server settings
     //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
     $mail->isSMTP();                                            // Send using SMTP
     $mail->Host       = 'smtp.mailtrap.io';                    // Set the SMTP server to send through
     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
     $mail->Username   = '4e75944b10c199';                     // SMTP username
     $mail->Password   = '1d51d6139e11ce';                               // SMTP password
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
     $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
 
     //Recipients
     $mail->setFrom( 'bilal.hasic@gmail.com', 'Pošiljaoc:');
     $mail->addAddress($email);     // Add a recipient
     //$mail->addAddress('ellen@example.com');               // Name is optional
     $mail->addReplyTo('kontakt@firma.com', 'Kontakt');
     //$mail->addCC('cc@example.com');
     //$mail->addBCC('bcc@example.com');
 
     // Attachments
     //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
     //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
     // Content
    // $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = 'Odgovor za upit rezervacije...';
     $mail->Body    = "<h1>Vas zahtjev je odbijen</h1>
                         Nazalost trenutno auto koje ste iznajmili ili nije na stanju ili je u kvaru pa nismo u mogucnosti da vam iznajmimo ovaj automobil, hvala na pokusaju i nadamo se da ce te nas kontaktirati opet L.P.";
     //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
     
     $mail->send();
     header("Location: ../admin/zahtjev.php");
     //echo '<script> 
       //  alert("Link za reset passworda je poslan na mail"); window.location.href="requestReset.php";
         //</script>';
     
     
 } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }
     exit();
 }


?>