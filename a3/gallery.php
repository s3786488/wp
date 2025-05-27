<?php
session_start();
include 'inc/header.inc';
include 'inc/nav.inc';
include 'inc/db_connect.inc';
?>

<main>
    <h2 class="title">GamesRUS has a lot to offer!</h2>
    <p class="description">
        To cater to the rapidly changing gaming landscape, ShopRUs also provides trade-in services and pre-owned game sales,
        allowing gamers to exchange old titles for store credit or discounted purchases. Additionally, the store has a strong online
        presence, with a user-friendly website offering nationwide shipping. Their loyalty program offers regular customers exclusive
        discounts, early access to sales, and invitations to members-only events.<br><br>
        ShopRUs continues to evolve, staying ahead of trends in gaming and community engagement. With its commitment to providing the
        best gaming experience, it's no wonder ShopRUs is a staple for gamers — veterans and newcomers alike.
    </p>

    <!-- Filter Dropdown -->
    <div class="filter-bar">
        <label for="filterType">Filter by Game Type:</label>
        <select class="form-select" id="filterType">
            <option value="all" <?= (!isset($_GET['type']) || $_GET['type'] === 'all') ? 'selected' : '' ?>>All Types</option>
            <?php
            try {
                $stmt = $pdo->query("SELECT DISTINCT type FROM games ORDER BY type ASC");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $selected = (isset($_GET['type']) && $_GET['type'] === $row['type']) ? 'selected' : '';
                    echo "<option value='" . htmlspecialchars($row['type']) . "' $selected>" . htmlspecialchars($row['type']) . "</option>";
                }
            } catch (Exception $e) {
                echo "<option disabled>Error loading types</option>";
            }
            ?>
        </select>
    </div>

    <!-- Gallery Grid -->
    <div class="gallery" id="game-gallery">
        <?php
        $selectedType = $_GET['type'] ?? 'all';

        // List of images to include
        $allowedImages = ['game1.jpg', 'game2.jpg', 'game3.jpg', 'game4.jpg', 'game5.jpg', 'game6.jpg'];
        $placeholders = implode(',', array_fill(0, count($allowedImages), '?'));

    try {
        if ($selectedType === 'all') {
        $query = "SELECT gameid, image, caption, type FROM games";
        $stmt = $pdo->query($query);
        } else {
        $query = "SELECT gameid, image, caption, type FROM games WHERE type = :type";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['type' => $selectedType]);
        }


            while ($row = $stmt->fetch()) {
                echo "<div class='gallery-item'>";
                echo "<a href='details.php?id=" . htmlspecialchars($row['gameid']) . "'>";
                echo "<img src='images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['caption']) . "' class='gallery-image'>";
                echo "<p class='caption'>" . htmlspecialchars($row['caption']) . "</p>";
                echo "</a>";
                echo "</div>";
            }
        } catch (Exception $e) {
            echo "<p>Error executing query: " . $e->getMessage() . "</p>";
        }
        ?>
    </div>
</main>

<script>
    document.getElementById('filterType').addEventListener('change', function () {
        const selectedType = this.value;
        window.location.href = `gallery.php?type=${encodeURIComponent(selectedType)}`;
    });
</script>

<?php include 'inc/footer.inc'; ?>
