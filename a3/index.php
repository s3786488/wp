<?php
session_start();
include 'inc/header.inc';
include 'inc/nav.inc';
?>

<main>
    <!-- Welcome Hero Section -->
    <div class="welcome">
        <div class="content">
            <h1>GAMESRUS</h1>
            <h2>WELCOME TO THE</h2>
            <h3>ULTIMATE GAMING DESTINATION</h3>
        </div>

        <!-- Carousel Replacing Static Image -->
        <div class="contentimg">
            <div id="carouselExample" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/game3.jpg" class="d-block w-100" alt="Puzzle Panic" style="max-height: 400px;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Puzzle Panic</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/game4.jpg" class="d-block w-100" alt="Survival Adventure" style="max-height: 400px;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Survival Adventure</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/game6.jpg" class="d-block w-100" alt="Fantasy Saga" style="max-height: 400px;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Fantasy Saga</h5>
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
    <div class="additional-content">
        <div class="content">
            <h1>Discover GamesRUS</h1>
            <p>
                GamesRUS is your go-to hub for discovering the best video games across genres and generations.
                Whether you're into action, puzzles, or fantasy adventures, GamesRUS helps you find what you're looking for — and trade your old games while you're at it.
                Our platform is built for gamers who want a great experience, both online and offline. With trade-ins, discounts, loyalty rewards, and a powerful search, GamesRUS is where real players connect with great titles.
            </p>
        </div>

        <!-- Search Section -->
        <div class="search-section">
            <form action="search.php" method="GET" id="search-form">
                <input type="text" name="search_query" placeholder="I am looking for ..." 
                    value="<?php echo isset($_GET['search_query']) ? htmlspecialchars($_GET['search_query']) : ''; ?>">

                <select name="type">
                    <option value="">Select game type</option>
                    <option value="Action" <?php if (isset($_GET['type']) && $_GET['type'] === 'Action') echo 'selected'; ?>>Action</option>
                    <option value="Fantasy" <?php if (isset($_GET['type']) && $_GET['type'] === 'Fantasy') echo 'selected'; ?>>Fantasy</option>
                    <option value="Puzzle" <?php if (isset($_GET['type']) && $_GET['type'] === 'Puzzle') echo 'selected'; ?>>Puzzle</option>
                </select>
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
</main>

<?php include 'inc/footer.inc'; ?>
