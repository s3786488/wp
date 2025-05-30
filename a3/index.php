<?php
session_start();
include 'inc/header.inc';
include 'inc/nav.inc';
?>

<?php if (isset($_SESSION['flash_message'])): ?>
    <div class="flash-success">
        <?= htmlspecialchars($_SESSION['flash_message']) ?>
        <?php unset($_SESSION['flash_message']); ?>
    </div>
<?php endif; ?>

<main>
    <!-- Welcome Hero Section -->
    <div class="welcome">
        <div class="content">
            <h1 class="permanent-marker-regular" style="color: #e84a5f;">GAMESRUS</h1>
            <h2>THE</h2>
            <h3>ULTIMATE GAMING DESTINATION</h3>
        </div>

        <!-- Carousel -->
        <div class="contentimg">
            <div id="carouselExample" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/game1.jpg" class="d-block w-100" alt="Call of Honor" style="max-height: 400px;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Call of Honor</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/game2.jpg" class="d-block w-100" alt="Fantasy Saga" style="max-height: 400px;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Fantasy Saga</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/game3.jpg" class="d-block w-100" alt="Puzzle Panic" style="max-height: 400px;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Puzzle Panic</h5>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Additional Description + Search -->
    <section class="section">
        <h2 class="title">GamesRUs has a lot to offer!</h2>
        <p class="description">
            To cater to the rapidly changing gaming landscape, GamesRUs also provides trade-in services and pre-owned game sales, allowing gamers to exchange old titles for store credit or discounted purchases. Additionally, the store has a strong online presence, with a user-friendly website offering nationwide shipping. Their loyalty program offers regular customers exclusive discounts, early access to sales, and invitations to members-only events.
        </p>
        <p class="description">
            GamesRUs continues to evolve, staying ahead of trends in gaming and community engagement. With its commitment to providing the best gaming experience, it’s no wonder GamesRUs is a staple for gamers — veterans and newcomers alike.
        </p>

        <!-- Search Bar -->
        <div class="filter-bar">
            <form action="search.php" method="GET">
                <input type="text" name="search_query" placeholder="I am looking for ..." 
                    value="<?= isset($_GET['search_query']) ? htmlspecialchars($_GET['search_query']) : '' ?>">
                <select name="type">
                    <option value="">Select type...</option>
                    <option value="Action" <?= (isset($_GET['type']) && $_GET['type'] === 'Action') ? 'selected' : '' ?>>Action</option>
                    <option value="Fantasy" <?= (isset($_GET['type']) && $_GET['type'] === 'Fantasy') ? 'selected' : '' ?>>Fantasy</option>
                    <option value="Puzzle" <?= (isset($_GET['type']) && $_GET['type'] === 'Puzzle') ? 'selected' : '' ?>>Puzzle</option>
                </select>
                <button class="submitButton" type="submit">Search</button>
            </form>
        </div>
    </section>
</main>

<?php include 'inc/footer.inc'; ?>
