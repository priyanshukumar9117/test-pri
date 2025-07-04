<?php
session_start();
include("includes/db_connect.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid login credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Electrician Booking</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <header>
    <div class="logo">⚡ Electrician Booking</div>
    <nav>
      <a href="#login">Login</a>
      <a href="#contact">Contact</a>
    </nav>
  </header>

  <section class="hero">
    <h1>Book a Trusted Electrician Near You</h1>
  </section>

  <section class="login-section" id="login">
    <div class="login-box">
      <h2>Login</h2>
      <form method="post">
        <input type="email" name="email" placeholder="📧 Email" required />
        <input type="password" name="password" placeholder="🔒 Password" required />
        <button type="submit" name="login">Login</button>
      </form>
      <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>
  </section>

  <footer id="contact">
    <p>&copy; 2025 Electrician Booking System | Made with ⚡ by Priyanshu</p>
  </footer>

</body>
</html>
