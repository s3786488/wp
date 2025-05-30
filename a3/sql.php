<?php
session_start();
include 'inc/db_connect.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $game = $_POST['game'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $caption = $_POST['caption'];
    $price = $_POST['price'];
    $platform = $_POST['platform'];
    $username = $_SESSION['username'] ?? 'guest'; // fallback if session not set

    $image = $_FILES['image']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $stmt = $pdo->prepare("INSERT INTO games (game, type, description, caption, price, platform, image, username) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$game, $type, $description, $caption, $price, $platform, $image, $username]);

        header("Location: games.php?success=Game+added");
        exit;
    } else {
        echo "Image upload failed.";
    }
}
?>
