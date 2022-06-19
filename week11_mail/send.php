<?php
require("conn.php");

$title=$_POST["title"];
$message=$_POST["content"];
$message=nl2br($message);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src\Exception.php';
require 'PHPMailer/src\PHPMailer.php';
require 'PHPMailer/src\SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 2;                      
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'a1093351@mail.nuk.edu.tw';                    
    $mail->Password   = 'a1093351';                              
    $mail->Port       = 465;                                   
    $mail->SMTPSecure = "ssl";
    $mail->Charset="UTF-8";

    $SQL="SELECT * FROM email";
    if($result=mysqli_query($link,$SQL)){
        while($row=mysqli_fetch_assoc($result)){
            $mail->setFrom('a193351@mail.nuk.edu.tw', '51');
            $mail->addAddress($row["eMail"]);
            $mail->isHTML(true);
            $mail->Subject = "=?utf-8?B?".base64_encode($title)."?=";
            $mail->Body    = $content;
        }
        $mail->send();
    }
    echo '訊息已傳送';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>