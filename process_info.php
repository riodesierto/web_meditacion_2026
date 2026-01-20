<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = $_POST["email"];

    // Prepare the data to send to the webhook
    $data = array(
        "email" => $email,
    );

    // Convert the data to JSON format
    $json_data = json_encode($data);

    // Set the webhook URL
    $webhook_url = "https://hooks.zapier.com/hooks/catch/17049573/26td5nv/";

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
        echo "Mensaje Enviado! Pronto Te Contactaremos!";
    }

    // Close cURL session
    curl_close($ch);
}
?>
