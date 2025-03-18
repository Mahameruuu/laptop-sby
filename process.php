<?php

include 'config.php';

$action = $_REQUEST['action'] ?? '';

switch ($action) {
    case 'create':
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        $conn->query($sql);
        header("Location: index.php");
        exit();
    case 'delete':
        $id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id=$id";
        $conn->query($sql);
        header("Location: index.php");
        exit();
    case 'update':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
        $conn->query($sql);
        header("Location: index.php");
        exit();
    case 'register':
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Cek apakah username atau email sudah ada
        $stmt = $conn->prepare("SELECT id FROM users WHERE name = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            header("Location: register.php?error=Username atau Email sudah digunakan.");
            exit();
        }

        // Insert user baru
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            header("Location: register.php?error=Gagal registrasi. Silakan coba lagi.");
        }
        exit();

    case 'login':
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE name = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;
            header("Location: index.html");
            exit();
        } else {
            header("Location: login.php?error=Login gagal. Coba lagi.");
        }
        exit();
    case 'forgot_password':
        $username = $_POST['username'];
        $result = $conn->query("SELECT * FROM users WHERE name='$username'");
        if ($result->num_rows > 0) {
            echo "Password reset link sent!";
        } else {
            echo "User tidak ditemukan.";
        }
        exit();
    case 'change_password':
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: login.php");
            exit();
        }
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $id = $_SESSION['user']['id'];
        $conn->query("UPDATE users SET password='$new_password' WHERE id=$id");
        echo "Password berhasil diubah.";
        exit();
}
?>