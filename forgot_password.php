<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h2 class="mt-5">Lupa Password</h2>
    <form method="POST" action="process.php?action=forgot_password">
        <input class="form-control mb-2" type="text" name="username" placeholder="Username" required>
        <button class="btn btn-primary" type="submit">Reset Password</button>
    </form>
</body>
</html>