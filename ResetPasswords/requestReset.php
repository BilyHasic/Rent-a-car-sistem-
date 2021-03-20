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




if(isset($_POST['email'])){
    
    

    $emailTo = $_POST['email'];

    $code = uniqid(true);
    $query = mysqli_query($db, "INSERT INTO  passwordreset(code, email) VALUES('$code', '$emailTo')");
    if(!$query){
        exit("Error");
    }
    

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
    $mail->addAddress($emailTo);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('kontakt@firma.com', 'Kontakt');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetPassword.php?code=$code";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Vaš Link za reset passworda';
    $mail->Body    = "<h1>Vaš zahtjev za reset passworda</h1>
                        Kliknite <a href='$url'>OVDJE</a> da ga resetujete";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    $mail->send();
    echo '<script> 
        alert("Link za reset passworda je poslan na mail"); window.location.href="requestReset.php";
        </script>';
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    exit();
}




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id=reset>
    <div class="Reset">
    <div class="resetTittle">
     <h2>Resetuj svoj paswrod</h2>
     </div>
     <div class="reForm">
     <form action="" method="POST">
    <input type="email" placeholder="E-mail" name="email" autocomplete="off" required><br>
    <input type="submit" name="submit" value="RESET">
    
     </div>
     <div class="register">
         <p><a href="../index.php">Nazad na stranicu</a></p>
     </div>
    </div>
    </section>
</body>
</html>
