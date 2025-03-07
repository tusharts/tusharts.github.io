<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $to = "tushar@tusharts.me";
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "Success!";
    } else {
        echo "Error sending email!";
    }
} else {
    http_response_code(405);
    echo "405 Not Allowed";
}
?>
