<?php
// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // You can add additional validation here if needed

    // Construct the email message
    $to = "ask.amitchandra@gmail.com"; // Change this to your email address
    $subject = "New Contact Form Submission";
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message";

    // Send the email
    $headers = "From: $email";
    if (mail($to, $subject, $email_message, $headers)) {
        // If email is sent successfully, send a success response to the client-side JavaScript
        http_response_code(200);
        echo json_encode(array("message" => "Form submitted successfully!"));
    } else {
        // If there's an error sending email, send an error response to the client-side JavaScript
        http_response_code(500);
        echo json_encode(array("message" => "An error occurred while submitting the form."));
    }
} else {
    // If the request method is not POST, send an error response
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Method not allowed."));
}
?>
