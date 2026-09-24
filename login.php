<?php
session_start();

$correct_username = "admin";
$correct_password = "12345";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $correct_username && $password === $correct_password) {

        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $username;

        header("Location: dashboard.php");
        exit();

    } else {

        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<h2>Login</h2>

<?php
if ($error != "") {
    echo "<p>$error</p>";
}
?>

<form method="POST">

    <label>Username:</label>
    <input type="text" name="username" required>

    <br><br>

    <label>Password:</label>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit">Login</button>

</form>

</body>
</html>

<?php
session_start();

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: index.php");
    exit();
}
?>

<h1>Welcome, <?php echo $_SESSION["username"]; ?>!</h1>

<p>You are now logged in.</p>
