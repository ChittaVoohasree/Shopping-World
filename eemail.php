<?php
$to = "voohachitti@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$v = $_POST['eemail'];
$headers = "From: chittabathini1995@gmail.com" . "\r\n" .
"CC: voohachitti@gmail.com";
mail($to,$subject,$txt,$headers);
?>