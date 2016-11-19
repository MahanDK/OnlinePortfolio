<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $formcontent=" From: $name \n Email: $email \n Message: $message";
  $recipient = "mahan1337@gmail.com";
  $subject = "Mahan.dk - Contact Form";
  $mailheader = "From: $email \r\n";


if(!$_POST['name']){
  $errname = "Please enter your name";
}

if(!$_POST['message']){
  $errmsg = "Please type a message";
}

if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$errmail = "The email entered is invalid";
}
// if(!$errname && !$errmsg && !$errmail){
if(isset($_POST['url']) && $_POST['url'] == ''){
  mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
  echo "Message sent. Thank you.";
}
else{
  echo "Thanks";
}


// header("location: http://localhost:3000");
// exit();
 ?>
