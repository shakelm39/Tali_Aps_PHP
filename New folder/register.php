<?php
session_start();
require_once 'config/config.php';
require_once 'classes/User.php';

$user = new User();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($user->register($firstName,$lastName,$email, $password)) {
        header("Location: login.php");
        exit;
    } else {
        $error = "Registration failed. Try again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="post" action="register.php">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" required>
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Register</button>
        </form>
        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
