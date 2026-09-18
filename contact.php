<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") { 
header("Location: index.html"); 
exit; 
}
$name=trim($_POST["name"]??""); 
$email=trim($_POST["email"]??""); 
$message=trim($_POST["message"]??"");
if($name==="" || $message==="" || !filter_var($email,FILTER_VALIDATE_EMAIL)){
    http_response_code(400);
    echo "<h2>Invalid submission</h2><p>Please provide your name, valid email and message.</p><p><a href='index.html'>Return</a></p>";
    exit;
    }
$to="joabodiwuor750@gmail.com"; $subject="Portfolio Contact Message from ".$name; $body="Name: $name\nEmail: $email\n\nMessage:\n$message"; $headers="From: $email\r\nReply-To: $email\r\n";
if(mail($to,$subject,$body,$headers)){
        echo "<h2>Thank you, ".htmlspecialchars($name)."!</h2><p>Your message has been submitted.</p><p><a href='index.html'>Back to portfolio</a></p>";
        }
        else
        {
            echo "<h2>Form received</h2><p>The form is configured, but XAMPP/hosting mail delivery may need SMTP setup.</p><p><a href='index.html'>Back to portfolio</a></p>";
            }
?>
