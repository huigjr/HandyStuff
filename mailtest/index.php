<?php
// PHP configuration settings
error_reporting(E_ALL);
ini_set('display_errors', '1'); // set to 0 in production

// Autoload Composer
include 'vendor/autoload.php';

$mail = new PHPMailer(true); 
/*
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
*/
try {
    //Server settings
    $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->Host = 'mail.peuterspeelzaalhannieschaft.nl';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@peuterspeelzaalhannieschaft.nl';
    $mail->Password = '#FoSi56lqTIJ';
    $mail->SMTPAutoTLS = false;
    $mail->SMTPSecure = '';
    $mail->Port = 25;

    //Recipients
    $mail->setFrom('info@peuterspeelzaalhannieschaft.nl');
    $mail->addAddress('helpdesk@muldata.nl');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Mail';
    $mail->Body    = '<b>Geef Huig een biertje!</b>';
    $mail->AltBody = 'Geef Huig een biertje!';

    $mail->send();
    echo 'Wachten op bier...';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>