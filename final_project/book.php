<?php
session_start();
include("includes/db_connect.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['book'])) {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $user_id = $_SESSION['user_id'];

    $check = mysqli_query($conn, "SELECT * FROM appointments WHERE user_id='$user_id' AND appointment_date='$date' AND appointment_time='$time'");
    if (mysqli_num_rows($check) > 0) {
        echo "You have already booked this slot.";
    } else {
        $query = "INSERT INTO appointments (user_id, appointment_date, appointment_time) VALUES ('$user_id', '$date', '$time')";
        if (mysqli_query($conn, $query)) {
            echo "Appointment booked successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!-- <h2>Book Electrician Appointment</h2>
<form method="post">
  Date: <input type="date" name="date" required><br><br>
  Time: <input type="time" name="time" required><br><br>
  <input type="submit" name="book" value="Book Appointment">
</form>
<p><a href="dashboard.php">⬅ Back to Dashboard</a></p> -->

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
       <h2>Book Electrician Appointment</h2>
<form method="post">
  Date: <input type="date" name="date" required><br><br>
  Time: <input type="time" name="time" required><br><br>
  <input type="submit" name="book" value="Book Appointment">
</form>
<p><a href="dashboard.php">⬅ Back to Dashboard</a></p>
    </div>
  </section>


  <footer id="contact">
    <p>&copy; 2025 Electrician Booking System | Made with ⚡ by Priyanshu</p>
  </footer>

</body>
</html>
