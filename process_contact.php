<?php
require_once('includes/connect.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = isset($_POST['first_name']) ? htmlspecialchars(trim($_POST['first_name'])) : '';
    $last_name = isset($_POST['last_name']) ? htmlspecialchars(trim($_POST['last_name'])) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';

    if (!empty($first_name) && !empty($last_name) && !empty($phone) && !empty($email) && !empty($message)) {
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

            $to = "a1203544@gmail.com"; 
            $subject = "New Contact Form Submission";
            $email_message = "Message from your Portfolio site!:\n\n";
            $email_message .= "Name: $first_name $last_name\n";
            $email_message .= "Phone: $phone\n";
            $email_message .= "Email: $email\n\n";
            $email_message .= "Message:\n$message\n";

            $headers = "From: noreply@yourdomain.com\r\n"; 
            $headers .= "Reply-To: $email\r\n";

            if (mail($to, $subject, $email_message, $headers)) {
                echo "<script>
                    alert('Thank you for your message. We will get back to you shortly!');
                    window.location.href = 'index.html';
                </script>";
            } else {
                echo "<script>
                    alert('Message sent but email notification failed.');
                    window.location.href = 'index.html';
                </script>";
            }
        } catch (PDOException $e) {
            echo "<script>
                alert('There was an error saving your message. Please try again.');
                window.history.back();
            </script>";
        }
    } else {
        echo "<script>
            alert('Please fill in all required fields.');
            window.history.back();
        </script>";
    }
} else {
    echo "<script>
        alert('Invalid request.');
        window.history.back();
    </script>";
}
?>
