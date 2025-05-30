<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include('inc/db_connect.inc');

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Invalid username or password.";
        }
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Failed</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <?php include 'inc/header.inc'; ?>
    <?php include 'inc/nav.inc'; ?>

    <main>
        <div class="formSection">
            <h2>Login Failed</h2>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
            <a href="login.php">← Back to Login</a>
        </div>
    </main>

    <?php include 'inc/footer.inc'; ?>
</body>
</html>
