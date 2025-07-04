<?php
include("includes/db_connect.php");

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "Email already exists!";
    } else {
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";
        if (mysqli_query($conn, $query)) {
            echo "Registered successfully. <a href='index.php'>Login</a>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - Electrician Booking</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header>
    <div class="logo">⚡ Electrician Booking</div>
    <nav>
      <a href="index.php">Login</a>
    </nav>
  </header>

  <section class="login-section">
    <div class="login-box">
      <h2>Register</h2>
      <form method="post">
        <input type="text" name="name" placeholder="👤 Name" required />
        <input type="email" name="email" placeholder="📧 Email" required />
        <input type="password" name="password" placeholder="🔒 Password" required />
        <button type="submit" name="register">Register</button>
      </form>
      <p>Already have an account? <a href="index.php">Login</a></p>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Electrician Booking System | Made with ⚡ by Priyanshu</p>
  </footer>
</body>
</html>

