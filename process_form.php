<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = $_POST["email"];
    $name = $_POST["name"];
    $message = $_POST["message"];

    // Prepare the data to send to the webhook
    $data = array(
        "email" => $email,
        "name" => $name,
        "message" => $message
    );

    // Convert the data to JSON format
    $json_data = json_encode($data);

    // Set the webhook URL
    $webhook_url = "https://hooks.zapier.com/hooks/catch/17049573/3vt9c1i/";

    // Set the HTTP headers
    $headers = array(
    	"Content-Type: application/json; charset=utf-8",
    	"Accept-Charset: utf-8"
    );

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $webhook_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the cURL request
    $response = curl_exec($ch);

    // Check for errors
    if ($response === false) {
        echo "Error: " . curl_error($ch);
    } else {
        echo "Mensaje Enviado!";
    }

    // Close cURL session
    curl_close($ch);
}
?>
