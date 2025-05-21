<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            header("Location: logged/dashboard.php");
        } else {
            $var = "Invalid password.";
            $colour = "red";
            //echo "Invalid password.";
        }
    } else {
        $var ="Invalid password.";
        $colour = "red";
        //echo "User not found.";
    }
}
?>
<link rel="stylesheet" href="login.css">
<header>
    <h1>Open book store</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="product.php">Products</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>


<div>
<form method="post">
    <?php
    if (isset($var)) {
    echo "<p style='color: $colour;'>$var</p>"; 
}?>
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
    <a href="register.php">Register</a>
</form>
</div>
