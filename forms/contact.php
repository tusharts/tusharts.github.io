<?php
$botToken = "7638645172:AAEFiwwvAnRE-LWrPCfuuP9cbl2LPW8FRak";
$chatId = "1116211356";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $text = "New Contact Form Submission:\nName: $name\nEmail: $email\nSubject: $subject\nMessage: $message";

    $url = "https://api.telegram.org/bot$botToken/sendMessage";
    
    $data = [
        "chat_id" => $chatId,
        "text" => $text
    ];

    $options = [
        "http" => [
            "header" => "Content-Type: application/json",
            "method" => "POST",
            "content" => json_encode($data)
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
}
?>
