<?php
session_start();
include 'inc/db_connect.inc';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['game_id'])) {
    $game_id = $_POST['game_id'];

    $stmt = $pdo->prepare("DELETE FROM games WHERE gameid = :id");
    $stmt->bindParam(':id', $game_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: gallery.php?deleted=1");
        exit;
    } else {
        echo "Failed to delete game.";
    }
}
?>
