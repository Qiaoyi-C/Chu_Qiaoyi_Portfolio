<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // 提取表單數據
  $first_name = htmlspecialchars(trim($_POST["first_name"]));
  $last_name = htmlspecialchars(trim($_POST["last_name"]));
  $phone = htmlspecialchars(trim($_POST["phone"]));
  $email = htmlspecialchars(trim($_POST["email"]));
  $message = htmlspecialchars(trim($_POST["message"]));

  // 驗證所有字段是否填寫
  if (empty($first_name) || empty($last_name) || empty($phone) || empty($email) || empty($message)) {
    echo "All fields are required!";
    exit;
  }

  // 驗證電子郵件格式
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format!";
    exit;
  }

  // 顯示成功消息
  echo "<h1>Form submitted successfully!</h1>";
  echo "<p>Thank you, $first_name $last_name. We will contact you at $email.</p>";
} else {
  echo "Invalid form submission.";
}
?>
