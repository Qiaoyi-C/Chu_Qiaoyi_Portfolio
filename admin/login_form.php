<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>


<?php if (isset($_SESSION['error'])): ?>
    <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
<?php endif; ?>

<form action="login.php" method="post" novalidate>
    <label for="username">Username: </label>
    <input type="text" name="username" id="username" required maxlength="50" pattern="[a-zA-Z0-9_]+" 
           title="Only letters, numbers, and underscores are allowed" autofocus><br>

    <label for="password">Password: </label>
    <div class="password-container">
        <input type="password" name="password" id="password" required maxlength="255" autocomplete="current-password">
        <button type="button" id="togglePassword">👁</button>
    </div>
    <br><br>

    <input type="submit" value="Login">
</form>

<script>
    document.getElementById("togglePassword").addEventListener("click", function() {
        let passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            this.textContent = "😔"; 
        } else {
            passwordInput.type = "password";
            this.textContent = "👁"; 
        }
    });
</script>

</body>
</html>
