<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check that the contact form has been submitted
if (isset($_POST["contact-name"]) && isset($_POST["contact-email"]) && isset($_POST["contact-message"]))
    // Remove all html and whitespace
    $contact_name = htmlentities(trim($_POST["contact-name"]));
    $contact_email = htmlentities(trim($_POST["contact-email"]));
    $contact_message = htmlentities(trim($_POST["contact-message"]));

    // After removal of HTML and whitespace, check if there is anything left
    if($contact_name != "" && $contact_email != "" && $contact_message != "") {
        $to = 'joshoxenham1@gmail.com';
        $subject = 'Contact Form Message';
        $message = $contact_message . "\r\n\r\n" . $contact_name;
        $headers = 'From: contact@joshoxe.com' ."\r\n" . 'Reply-To: ' . $contact_email . "\r\n" . 'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        header('Location: index.html');
        exit;
    } else {
        header('Location: index.html');
        exit;
    }
?>