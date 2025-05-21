<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hashed password

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        //echo "Registered successfully. <a href='login.php'>Login here</a>";
        $succsec ="Registered successfully. <a href='login.php'>Login here</a>";
    } else {
        $error = "You can't log in. Registration failed.\n $stmt->error";
        //echo "Error: " . $stmt->error;
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
    if (isset($error)) {
    echo "<p style='color: red;'>$error</p>"; 
}?>
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Register</button>
    <?php
    if (isset($succsec)) {
    echo "<p style='color: blue;'>$succsec</p>"; 
}?>
</form>
</div>