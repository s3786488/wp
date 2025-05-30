<?php
include 'inc/header.inc';
include 'inc/nav.inc';
include 'inc/db_connect.inc';

$searchQuery = $_GET['search_query'] ?? '';
$selectedType = $_GET['type'] ?? '';

try {
    $query = "SELECT * FROM games WHERE (game LIKE :search_query OR description LIKE :search_query)";
    if (!empty($selectedType)) {
        $query .= " AND type = :type";
    }

    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':search_query', '%' . $searchQuery . '%');

    if (!empty($selectedType)) {
        $stmt->bindValue(':type', $selectedType);
    }

    $stmt->execute();
    $results = $stmt->fetchAll();

    if ($results) {
        echo "<div class='gallery'>";
        foreach ($results as $game) {
            echo "<div class='gallery-item'>";
            echo "<a href='details.php?id=" . htmlspecialchars($game['gameid']) . "'>";
            echo "<img src='images/" . htmlspecialchars($game['image']) . "' class='gallery-image'>";
            echo "<p class='caption'>" . htmlspecialchars($game['caption']) . "</p>";
            echo "</a>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>No games found.</p>";
    }

} catch (Exception $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}

include 'inc/footer.inc';
?>
