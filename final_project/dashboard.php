<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!-- <h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>
<p><a href="book.php">📅 Book Appointment</a></p>
<p><a href="my_bookings.php">📋 View My Bookings</a></p>
<p><a href="logout.php">🚪 Logout</a></p> -->

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
    </nav>
  </header>

  <section class="login-section" id="login">
    <div class="login-box">
       <h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>
       <p><a href="book.php">📅 Book Appointment</a></p>
       <p><a href="my_bookings.php">📋 View My Bookings</a></p>
       <p><a href="logout.php">🚪 Logout</a></p>
    </div>
  </section>


  <footer id="contact">
    <p>&copy; 2025 Electrician Booking System | Made with ⚡ by Priyanshu</p>
  </footer>

</body>
</html>
