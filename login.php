<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h2 class="mt-5">Login</h2>
    <form method="POST" action="process.php?action=login">
        <input class="form-control mb-2" type="text" name="username" placeholder="Username" required>
        <input class="form-control mb-2" type="password" name="password" placeholder="Password" required>
        <button class="btn btn-primary" type="submit">Login</button>
    </form>
    <a href="register.php">Register</a>
    <a href="forgot_password.php">Lupa Password?</a>
</body>
</html>