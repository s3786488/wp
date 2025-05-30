<?php
include 'inc/header.inc';
include 'inc/nav.inc';
?>

<main class="container mt-5">
    <h2 class="mb-4">Register</h2>
    <form action="registersql.php" method="post">
        <div class="form-group mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group mb-4">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</main>

<?php include 'inc/footer.inc'; ?>