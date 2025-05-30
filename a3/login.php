<?php
include 'inc/header.inc';  // Include header file
include 'inc/nav.inc';     // Include navigation file
?>

    <h2>Login Page</h2>
    <form method="post" action="loginsql.php">
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
        <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    </form>

<?php include 'inc/footer.inc';  // Include footer file ?>