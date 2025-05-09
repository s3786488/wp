<?php include('includes/header.inc'); ?>
<?php include('includes/nav.inc'); ?>

<main>
    <div class="add-game-container">
        <h1>Add a New Game</h1>
        <p>Fill out the form below to add a new game to our collection.</p>
        <form method="POST" action="add.php" enctype="multipart/form-data">
            <label for="game-title">Game Title:</label>
            <input type="text" id="game-title" name="game-title" required>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" required>

            <label for="release-date">Release Date:</label>
            <input type="date" id="release-date" name="release-date" required>

            <label for="game-image">Game Image:</label>
            <input type="file" id="game-image" name="game-image" accept="image/*" required>

            <div class="form-buttons">
                <button type="submit" class="styled-button">Add Game</button>
                <button type="reset" class="outlined-button">Reset</button>
            </div>
        </form>
    </div>
</main>

<?php include('includes/footer.inc'); ?>