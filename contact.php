<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $formcontent=" From: $name \n Email: $email \n Message: $message";
  $recipient = "mahan1337@gmail.com";
  $subject = "Mahan.dk - Contact Form";
  $mailheader = "From: $email \r\n";
  mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
  echo "Thank You!";
 ?>
