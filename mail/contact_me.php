<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !empty($_POST['telephone']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "contact@fresquedunumerique.org";
$subject = "La Fresque du Numérique - message de $name";
$body = "Nouveau message reçu depuis le site web de la Fresque du Numérique, de la part de $name - $email\n\n$message";
$header = "From: contact@fresquedunumerique.org\n";
$header .= "Reply-To: $email";

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
