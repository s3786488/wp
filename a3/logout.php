<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();
?>

<?php include 'inc/header.inc'; ?>
<?php include 'inc/nav.inc'; ?>

    <p>You have been logged out. <a href="index.php">Click here</a> to index again.</p>

<?php include 'inc/footer.inc'; ?>