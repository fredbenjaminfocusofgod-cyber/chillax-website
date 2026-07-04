<?php
header('Content-Type: application/json');
include '../includes/db.php';
include '../includes/functions.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $service = $_POST['service'] ?? '';
    $checkin = $_POST['checkin'] ?? '';
    $checkout = $_POST['checkout'] ?? '';
    $guests = $_POST['guests'] ?? '';
    $message = $_POST['message'] ?? '';
    
    if (empty($name) || empty($email) || empty($phone) || empty($service)) {
        $response['message'] = 'Please fill in all required fields';
    } elseif (!validateEmail($email)) {
        $response['message'] = 'Please enter a valid email';
    } else {
        if (addBooking($name, $email, $phone, $service, $checkin, $checkout, $guests, $message)) {
            $response['success'] = true;
            $response['message'] = 'Booking submitted successfully!';
            
            // Send confirmation email
            $subject = 'Booking Confirmation - Chillax Hotel';
            $emailBody = "<h2>Booking Confirmation</h2>
                         <p>Hi $name,</p>
                         <p>Thank you for booking with us!</p>
                         <p><strong>Booking Details:</strong></p>
                         <ul>
                         <li>Service: $service</li>
                         <li>Check-in: $checkin</li>
                         <li>Check-out: $checkout</li>
                         <li>Guests: $guests</li>
                         </ul>
                         <p>We'll contact you shortly to confirm your booking.</p>
                         <p>Best regards,<br>Chillax Hotel and Spa Team</p>";
            
            sendEmail($email, $subject, $emailBody);
        } else {
            $response['message'] = 'Error saving booking. Please try again.';
        }
    }
}

echo json_encode($response);
?>
