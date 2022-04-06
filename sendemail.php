<?php
// Define some constants
define( "RECIPIENT_NAME", "Astro XP" );
define( "RECIPIENT_EMAIL", "inquiries@astroxp.io" );

// Read the form values
$success = false;
$fromName = isset( $_POST['username'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['username'] ) : "";
$fromEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $fromName && $fromEmail && $message) {
  $sender = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $from = $fromName.' <'.$fromEmail.'>';

    $headers = "";
    $headers .= "From: ". $from . "\n";
    $headers .= "Cc: Astro XP <astroxp.official@astroxp.io>\n"; 
    $headers .= "Subject: Astro XP Inquiries - Astronian: " . $fromName . "\n"; 
    $headers .= "X-Sender: " . $sender . "\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();
    $headers .= "X-Priority: 3\n";
    $headers .= "Return-Path: astroxp.official@astroxp.io\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
  
  $msgBody = $message;
  $success = mail( $sender, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: contact.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: contact.html?message=Failed');	
}

?>