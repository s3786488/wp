<?php
session_start();
include 'inc/header.inc';
include 'inc/nav.inc';
include 'inc/db_connect.inc';
?>

<main class="section" style="padding: 30px;">
    <div class="container">
        <h2 class="title" style="color: #e84a5f; text-align: center; margin-bottom: 20px;">Discover GamesRUs</h2>
        <p class="description" style="max-width: 1000px; margin: 0 auto 40px auto;">
            Located in the heart of the city, ShopRUs is a haven for both casual gamers and dedicated enthusiasts alike.
            Established in 2010, the store has grown into a community hub, offering a wide array of video games, board games,
            consoles, and gaming accessories. From the latest AAA titles to indie gems, ShopRUs prides itself on maintaining
            a diverse and carefully curated selection. Whether you're looking for the hottest new release or a nostalgic classic,
            the knowledgeable staff at GamesRUs is always ready to assist with recommendations or troubleshooting any gaming-related queries.
        </p>

        <div class="row align-items-start mt-5">
            <!-- Game Image -->
            <div class="col-md-5">
                <img src="images/games.jpeg" alt="Gaming setup" class="img-fluid rounded shadow">
            </div>

            <!-- Game Table -->
            <div class="col-md-7">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead style="background-color: #e84a5f; color: white;">
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Platforms</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        try {
                            $stmt = $pdo->query("SELECT gameid, game, type, caption, price, platform FROM games ORDER BY gameid DESC");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td><a href='details.php?id=" . htmlspecialchars($row['gameid']) . "' style='color: #e84a5f; font-weight: bold; text-decoration: none;'>" . htmlspecialchars($row['game']) . "</a></td>";
                                echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                                echo "<td>$" . number_format($row['price'], 2) . "</td>";
                                echo "<td>" . htmlspecialchars($row['platform']) . "</td>";
                                echo "</tr>";
                            }
                        } catch (PDOException $e) {
                            echo "<tr><td colspan='4'>Error loading games: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'inc/footer.inc'; ?>
