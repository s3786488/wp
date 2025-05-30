<?php
session_start();
include 'inc/header.inc';
include 'inc/nav.inc';
include 'inc/db_connect.inc';

$game = null;

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM games WHERE gameid = ?");
    $stmt->execute([$id]);
    $game = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['game_id'])) {
    $game_id = $_POST['game_id'];
    $gameTitle = $_POST['game'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $caption = $_POST['caption'];
    $price = $_POST['price'];
    $platform = $_POST['platform'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageName = basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "images/$imageName");
    } else {
        $imageName = $game['image']; // Use existing image
    }

    $stmt = $pdo->prepare("UPDATE games SET game = ?, type = ?, description = ?, caption = ?, price = ?, platform = ?, image = ? WHERE gameid = ?");
    $stmt->execute([$gameTitle, $type, $description, $caption, $price, $platform, $imageName, $game_id]);

    header("Location: details.php?id=$game_id");
    exit;
}
?>

<main class="container mt-5">
    <h2>Edit Game Details</h2>
    <?php if ($game): ?>
        <form class="gamesForm" action="edit.php?id=<?= htmlspecialchars($game['gameid']) ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="game_id" value="<?= htmlspecialchars($game['gameid']) ?>">

            <label for="game">Game Title:</label>
            <input type="text" id="game" name="game" value="<?= htmlspecialchars($game['game']) ?>" required>

            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="Action" <?= ($game['type'] === 'Action') ? 'selected' : '' ?>>Action</option>
                <option value="Fantasy" <?= ($game['type'] === 'Fantasy') ? 'selected' : '' ?>>Fantasy</option>
                <option value="Puzzle" <?= ($game['type'] === 'Puzzle') ? 'selected' : '' ?>>Puzzle</option>
            </select>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?= htmlspecialchars($game['description']) ?></textarea>

            <label for="caption">Image Caption:</label>
            <input type="text" id="caption" name="caption" value="<?= htmlspecialchars($game['caption']) ?>" required>

            <label for="price">Price ($):</label>
            <input type="number" id="price" name="price" step="0.01" value="<?= htmlspecialchars($game['price']) ?>" required>

            <label for="platform">Platforms:</label>
            <input type="text" id="platform" name="platform" value="<?= htmlspecialchars($game['platform']) ?>" required>

            <label for="image">Update Image:</label>
            <input type="file" id="image" name="image" accept="image/*">

            <div class="form-actions">
                <button type="submit" class="submitButton">Save Changes</button>
                <button type="reset" class="resetButton">Clear</button>
            </div>
        </form>
    <?php else: ?>
        <p>Game not found.</p>
    <?php endif; ?>
</main>

<?php include 'inc/footer.inc'; ?>
