<?php
require_once('includes/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = isset($_POST['first_name']) ? trim($_POST['first_name']) : '';
    $last_name = isset($_POST['last_name']) ? trim($_POST['last_name']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    if (!empty($first_name) && !empty($last_name) && !empty($phone) && !empty($email) && !empty($message)) {
        $query = "INSERT INTO Contact (first_name, last_name, phone, email, message, date) 
                  VALUES (?, ?, ?, ?, ?, NOW())";

        $stmt = $connect->prepare($query);
        $stmt->bind_param("sssss", $first_name, $last_name, $phone, $email, $message);

        if ($stmt->execute()) {
      
            $to = "a1203544@gmail.com"; 
            $subject = "New Contact Form Submission";
            $email_message = "'Message from your Portfolio site!:\n\n";
            $email_message .= "Name: $first_name $last_name\n";
            $email_message .= "Phone: $phone\n";
            $email_message .= "Email: $email\n\n";
            $email_message .= "Message:\n$message\n";

            
            $headers = "From: noreply@yourdomain.com\r\n"; 
            $headers .= "Reply-To: $email\r\n";

           
            if (mail($to, $subject, $email_message, $headers)) {
                
                echo "<script>
                    alert('Thank you for your message. We will get back to you shortly!');
                    window.location.href = 'index.html'; // 提交成功後重定向的頁面
                </script>";
            } else {
                echo "<script>
                    alert('Message sent but email notification failed.');
                    window.location.href = 'index.html';
                </script>";
            }
        } else {
            echo "<script>
                alert('There was an error saving your message. Please try again.');
                window.history.back(); // 返回上一頁
            </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
            alert('Please fill in all required fields.');
            window.history.back(); // 返回上一頁
        </script>";
    }
} else {
    echo "<script>
        alert('Invalid request.');
        window.history.back(); // 返回上一頁
    </script>";
}
?>
