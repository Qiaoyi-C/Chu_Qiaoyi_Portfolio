<?php
require_once('includes/connect.php');

// Initialize response array
$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and get form values
    $first_name = isset($_POST['first_name']) ? htmlspecialchars(trim($_POST['first_name'])) : '';
    $last_name = isset($_POST['last_name']) ? htmlspecialchars(trim($_POST['last_name'])) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['error'] = 'Invalid email address.';
    }

    // Check if all required fields are filled
    if (empty($first_name) || empty($last_name) || empty($phone) || empty($email) || empty($message)) {
        $response['error'] = 'Please fill in all required fields.';
    }

    // If there are no errors, insert data into the database
    if (!isset($response['error'])) {
        try {
            $query = "INSERT INTO Contact (first_name, last_name, phone, email, message, date) 
                      VALUES (:first_name, :last_name, :phone, :email, :message, NOW())";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':phone' => $phone,
                ':email' => $email,
                ':message' => $message
            ]);

            // Send email notification (optional)
            $to = "a1203544@gmail.com";
            $subject = "New Contact Form Submission";
            $email_message = "Message from your Portfolio site!:\n\n";
            $email_message .= "Name: $first_name $last_name\n";
            $email_message .= "Phone: $phone\n";
            $email_message .= "Email: $email\n\n";
            $email_message .= "Message:\n$message\n";

            $headers = "From: noreply@yourdomain.com\r\n";
            $headers .= "Reply-To: $email\r\n";

            // If email is sent, return success
            if (mail($to, $subject, $email_message, $headers)) {
                $response['success'] = 'Thank you for your message. We will get back to you shortly!';
            } else {
                $response['error'] = 'Message sent but email notification failed.';
            }
        } catch (PDOException $e) {
            $response['error'] = 'There was an error saving your message. Please try again.';
        }
    }

    // Return response as JSON
    echo json_encode($response);
} else {
    echo json_encode(['error' => 'Invalid request.']);
}
?>
