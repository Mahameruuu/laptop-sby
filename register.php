<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <h2 class="mt-5">Register</h2>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>

    <form method="POST" action="process.php?action=register">
        <div class="mb-2">
            <label>Username:</label>
            <input class="form-control" type="text" name="username" required>
        </div>
        <div class="mb-2">
            <label>Email:</label>
            <input class="form-control" type="email" name="email" required>
        </div>
        <div class="mb-2">
            <label>Password:</label>
            <input class="form-control" type="password" name="password" required>
        </div>
        <button class="btn btn-primary" type="submit">Register</button>
    </form>
</body>
</html>
