<?php
session_start();
include 'inc/header.inc';
include 'inc/nav.inc';
?>

<main>
    <section class="formSection">
        <h1 class="addFormTitle">Add a Game</h1>
        <p class="TitleUndertext">Upload a new game listing below</p>
        <form class="gamesForm" action="sql.php" method="POST" enctype="multipart/form-data">
            <label for="game-name">Game Name: <span class="required">*</span></label>
            <input type="text" id="game-name" name="game" placeholder="Enter game title" required>

            <label for="game-type">Type: <span class="required">*</span></label>
            <input type="text" id="game-type" name="type" placeholder="e.g. Puzzle, Action, Strategy" required>

            <label for="description">Description: <span class="required">*</span></label>
            <textarea id="description" name="description" placeholder="Enter a short description" required></textarea>

            <label for="game-image">Upload Game Image: <span class="required">*</span></label>
            <input type="file" id="game-image" name="image" accept="image/*" required>
            <span class="imageSize">Max image size: 500KB</span>

            <label for="caption">Image Caption: <span class="required">*</span></label>
            <input type="text" id="caption" name="caption" placeholder="e.g. Epic Shooter" required>

            <label for="price">Price ($): <span class="required">*</span></label>
            <input type="number" step="0.01" id="price" name="price" placeholder="e.g. 49.99" required>

            <label for="platform">Platform(s): <span class="required">*</span></label>
            <input type="text" id="platform" name="platform" placeholder="e.g. PC, Xbox, PS5" required>

            <div class="form-actions">
                <button type="submit" class="submitButton">Submit</button>
                <button type="reset" class="resetButton">Clear</button>
            </div>
        </form>
    </section>
</main>

<?php include 'inc/footer.inc'; ?>
