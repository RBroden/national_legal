<?php


$email = $_REQUEST['email'] ;

$name = $_REQUEST['name'] ;

$state = $_REQUEST['state'] ;

$phone = $_REQUEST['phone'] ;

$comment = $_REQUEST['comment'] ;

$ip = $_SERVER['REMOTE_ADDR'];
// When we unzipped PHPMailer, it unzipped to

// public_html/PHPMailer_5.2.0
require("/home/national/public_html/phpmailer/class.phpmailer.php");


$mail = new PHPMailer();

$mail->Host = "mail.clientsupportservices.net";  


$mail->SMTPAuth = true;     
$mail->Username = "send@nationallegal.com";  

$mail->Password = "box999"; 
$mail->SetFrom("noreply@nationallegal.com", "Mail from Contact web page");


$mail->AddAddress ("support@nationallegal.com", "Form submission - National Legal Contact Page");

$mail->WordWrap = 50;


$mail->IsHTML(true);


$mail->Subject = "National Legal Contact Form";


$mail->Body    = "Email:  $email<br>";
$mail->Body    .= "Name:  $name<br>";
$mail->Body    .= "State:  $state<br>";
$mail->Body    .= "Phone:  $phone<br>";
$mail->Body    .= "Comment:  $comment<br>";

$mail->Body    .= "Remote IP Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp$ip<br>";
if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   
echo "Mailer Error: " . 
$mail->ErrorInfo;
   exit;
}


 print "<meta http-equiv=\"refresh\" content=\"0;URL=http://www.nationallegal.com/thankyou.html\">";
?>
