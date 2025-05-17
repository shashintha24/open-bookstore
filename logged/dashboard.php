<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<?php include '../partials/headerdash.php'; ?>
<link rel="stylesheet" href="style.css">
<h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>

<?php include '../partials/footer.php'; ?>