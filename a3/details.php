<?php
session_start();
include 'inc/header.inc';
include 'inc/nav.inc';
include 'inc/db_connect.inc';
?>

<main class="container mt-5">
    <h2>Game Details</h2>
    <?php
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM games WHERE gameid = ?");
        $stmt->execute([$id]);
        $game = $stmt->fetch();

        if ($game):
    ?>
    <div class="row">
        <div class="col-md-6">
            <img src="images/<?= htmlspecialchars($game['image']) ?>" alt="<?= htmlspecialchars($game['caption']) ?>" class="details-image img-fluid">
        </div>
        <div class="col-md-6">
            <h3><?= htmlspecialchars($game['game']) ?></h3>
            <p><strong>Type:</strong> <?= htmlspecialchars($game['type']) ?></p>
            <p><strong>Price:</strong> $<?= htmlspecialchars($game['price']) ?></p>
            <p><strong>Platforms:</strong> <?= htmlspecialchars($game['platform']) ?></p>
            <p><strong>Description:</strong> <?= htmlspecialchars($game['description']) ?></p>

            <?php if (!empty($_SESSION['username'])): ?>
                <form action="delete.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this game?');">
                    <input type="hidden" name="game_id" value="<?= htmlspecialchars($id) ?>">
                    <button type="submit" class="btn btn-danger mt-3">Delete Game</button>
                </form>
                <a href="edit.php?id=<?= htmlspecialchars($id) ?>" class="btn btn-warning mt-3 ml-2">Edit Game</a>
            <?php endif; ?>
        </div>
    </div>
    <?php
        else:
            echo "<p>Game not found.</p>";
        endif;
    } else {
        echo "<p>No game ID provided.</p>";
    }
    ?>
</main>

<?php include 'inc/footer.inc'; ?>
