<?php
header('Content-Type: application/json');
include '../includes/db.php';
include '../includes/functions.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    
    if (empty($name) || empty($email) || empty($message)) {
        $response['message'] = 'Please fill in all fields';
    } elseif (!validateEmail($email)) {
        $response['message'] = 'Please enter a valid email';
    } else {
        if (addContactMessage($name, $email, $message)) {
            $response['success'] = true;
            $response['message'] = 'Message sent successfully!';
            
            // Send confirmation to user
            $subject = 'We received your message - Chillax Hotel';
            $emailBody = "<h2>Message Received</h2>
                         <p>Hi $name,</p>
                         <p>Thank you for contacting us. We've received your message and will get back to you soon.</p>
                         <p>Best regards,<br>Chillax Hotel and Spa Team</p>";
            
            sendEmail($email, $subject, $emailBody);
        } else {
            $response['message'] = 'Error sending message. Please try again.';
        }
    }
}

echo json_encode($response);
?>
