<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $success = "Thanks, $name! We'll get back to you at $email.";
}
?>

<?php include '../partials/headerdash.php'; ?>
<link rel="stylesheet" href="style.css">
<div class="container">
    <h2>Contact Us</h2>
    <?php if (!empty($success)) echo "<p style='color: green;'>$success</p>"; ?>
    <form method="post" action="contact.php">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send</button>
    </form>
</div>
<?php include '../partials/footer.php'; ?>
