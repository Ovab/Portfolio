<?php
$to      = 'bavo.famknol@gmail.com';
$subject = $_POST['subject'];
$message = $_POST['message'];
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)){
    echo 'Email sent';
}
else{
    echo 'something went wrong, please try again';
}