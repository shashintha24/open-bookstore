<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
<p><a href="logout.php">Logout</a></p>
