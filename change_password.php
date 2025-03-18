<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ganti Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h2 class="mt-5">Ganti Password</h2>
    <form method="POST" action="process.php?action=change_password">
        <input class="form-control mb-2" type="password" name="new_password" placeholder="Password Baru" required>
        <button class="btn btn-primary" type="submit">Ganti Password</button>
    </form>
</body>
</html>
