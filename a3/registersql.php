<?php
include 'inc/db_connect.inc';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Secure hash
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashedPassword]);

        echo "<div class='container mt-5'>
                <div class='alert alert-success'>
                    <h3>Registration Successful</h3>
                    <p>You can now <a href='login.php'>log in</a>.</p>
                </div>
              </div>";
    } catch (PDOException $e) {
        echo "<div class='container mt-5'>
                <div class='alert alert-danger'>
                    <h3>Registration Failed</h3>
                    <p>Error: " . htmlspecialchars($e->getMessage()) . "</p>
              </div></div>";
    }
}
?>