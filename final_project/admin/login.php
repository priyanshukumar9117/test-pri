<?php
session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === "admin@electrician.com" && $password === "admin123") {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
    } else {
        echo "Invalid login credentials!";
    }
}
?>
<h2>Admin Login</h2>
<form method="post">
  Email: <input type="email" name="email" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  <input type="submit" name="login" value="Login">
</form>
