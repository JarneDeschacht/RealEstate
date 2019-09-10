<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/Exception.php';
require '../PHPMailer/SMTP.php';

$sNewPassword = uniqid();
$sEmail = $_GET['email'];

//change password
$sjData = file_get_contents(__DIR__ . '/../data.json');
$jData = json_decode($sjData);
$sUserId = '';
foreach ($jData as $jUser) {
    if ($jUser->email == $sEmail) {
        $sUserId = $jUser->id;
        $jUser = $jData->$sUserId;
        $jUser->password = $sNewPassword;
        $jData->$sUserId = $jUser;
        file_put_contents(__DIR__ . '/../data.json', json_encode($jData, JSON_PRETTY_PRINT));

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'mailtest.kea@gmail.com';            // SMTP username
            $mail->Password   = 'P@ssword1111';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('mailtest.kea@gmail.com', 'Password reset');
            $mail->addAddress($jUser->email, 'Password reset');
            // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Your new password';
            $mail->Body    = '<br><p>Hi ' . $jUser->firstname . ',</p><br><p>Your new Password: ' . $sNewPassword . '</p><br><p>We recommend you to change it in your profile settings!</p>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();


            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

header('location: ../login');
