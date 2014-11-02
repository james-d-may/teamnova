<?php
/**
 * This section ensures that Twilio gets a response.
 */
header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<Response> Thanks for leaving a message.</Response>'; //Place the desired response (if any) here.

// include 'twilioPA.php';
 
/**
 * This section actually sends the email.
 */
$to      = "may.d.james@gmail.com"; // Company email address.
$subject = "New Twiliyo message from {$_REQUEST['From']}";
$message = "You have received a message from {$_REQUEST['From']}.\n\n";
$message .= "To listen to this message, please visit this URL: {$_REQUEST['RecordingUrl']}";
$headers = "From: messages@twiliyo.com"; // Who should it come from?
 
mail($to, $subject, $message, $headers);