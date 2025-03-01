<!DOCTYPE html>
<html lang="en">

<?php
require_once('../includes/connect.php');

$stmt = $pdo->prepare('SELECT id, title FROM Project ORDER BY title ASC');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Main Page</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body>

<?php
// 顯示專案列表
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo  '<p class="project-list">'.
            $row['title'].
            '<a href="edit_project_form.php?id='.$row['id'].'">edit</a>'.
            '<a href="delete_project.php?id='.$row['id'].'">delete</a>'.
         '</p>';
}

$stmt = null;
?>

<br><br><br>
<h3>Get in Touch!</h3>

<form class="contact-form" method="POST" action="process_contact.php">
    <label for="first-name">First Name</label>
    <input type="text" id="first-name" name="first_name" placeholder="First Name" required>

    <label for="last-name">Last Name</label>
    <input type="text" id="last-name" name="last_name" placeholder="Last Name" required>

    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" placeholder="Phone" required>

    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" placeholder="E-mail" required>

    <label for="message">Message</label>
    <textarea id="message" name="message" placeholder="Message" required></textarea>

    <button type="submit" class="button-link">Send</button>
</form>

<!-- Success Modal -->
<div id="successModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Thank you for your message. We will get back to you shortly!</p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('.contact-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // 防止表單立即提交
            // 這裡可以發送 AJAX 請求來處理表單提交
            // 如果成功，就顯示模態框
            var modal = document.getElementById("successModal");
            modal.style.display = "block"; // 顯示模態框

            // 關閉模態框
            var closeBtn = document.querySelector(".close");
            closeBtn.addEventListener('click', function() {
                modal.style.display = "none"; // 隱藏模態框
            });
        });
    });
</script>

</body>
</html>
