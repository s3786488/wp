<?php
session_start();
include 'inc/db_connect.inc';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashedPassword]);

        $_SESSION['flash_message'] = "Registration successful!";
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "<div class='container mt-5'>
                <div class='alert alert-danger'>
                    <h3>Registration Failed</h3>
                    <p>Error: " . htmlspecialchars($e->getMessage()) . "</p>
              </div></div>";
    }
}
?>
