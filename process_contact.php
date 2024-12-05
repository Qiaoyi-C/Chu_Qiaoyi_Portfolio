<?php

require_once('includes/connect.php'); // 確保這個檔案連接到你的資料庫

// 收集表單數據
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msg = $_POST['message'];

$errors = [];

// 驗證表單數據
$fname = trim($fname);
$lname = trim($lname);
$email = trim($email);
$phone = trim($phone);
$msg = trim($msg);

if(empty($lname)) {
    $errors['last_name'] = 'Last Name can\'t be empty.';
}

if(empty($fname)) {
    $errors['first_name'] = 'First Name can\'t be empty.';
}

if(empty($msg)) {
    $errors['message'] = 'Message field can\'t be empty.';
}

if(empty($email)) {
    $errors['email'] = 'You must provide an email.';
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'You must provide a valid email.';
}

if(empty($errors)) {
    // 插入數據到資料庫
    $query = "INSERT INTO Contact (last_name, first_name, email, phone, message) VALUES ('$lname', '$fname', '$email', '$phone', '$msg')";

    if(mysqli_query($connect, $query)) {
        // 發送通知郵件
        $to = 'a1203544@gmail.com'; // 替換為你的郵件地址
        $subject = 'Message from your Portfolio site!';
        $message = "You have received a new contact form submission:\n\n";
        $message .= "Name: ".$fname." ".$lname."\n";
        $message .= "Email: ".$email."\n";
        $message .= "Phone: ".$phone."\n";
        $message .= "Message: ".$msg."\n";

        mail($to, $subject, $message);

        // 重定向到感謝頁面
        header('Location: thank_you.php');
        exit();
    } else {
        echo 'Error: Could not save data to the database.';
    }
} else {
    // 顯示錯誤訊息
    foreach ($errors as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
}
?>
