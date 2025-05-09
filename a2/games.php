<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<main>
    <div class="game-info-container">
        <h1>Our Games</h1>
        <div class="game-display-container">
            <div class="game-image-container">
                <img class="game-image" src="images/game1.jpg" alt="Game Image">
            </div>
            <div class="game-table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Game Title</th>
                            <th>Genre</th>
                            <th>Release Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Game data will be dynamically loaded here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include('includes/footer.inc'); ?>