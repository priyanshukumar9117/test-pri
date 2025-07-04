<?php
session_start();
include("includes/db_connect.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM appointments WHERE user_id='$user_id' ORDER BY appointment_date, appointment_time");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>My Bookings</title>
  <link rel="stylesheet" href="assets/css/homepage.css">
  <style>
    .bookings-section {
      padding: 40px 20px;
      text-align: center;
    }

    .bookings-section h2 {
      margin-bottom: 20px;
      color: #00d1ff;
    }

    .booking-table {
      width: 90%;
      max-width: 1000px;
      margin: auto;
      border-collapse: collapse;
      background-color: #0f3460;
      color: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.4);
    }

    .booking-table th, .booking-table td {
      padding: 12px;
      border: 1px solid #1a1a2e;
      text-align: center;
    }

    .booking-table th {
      background-color: #00d1ff;
      color: #000;
    }

    .booking-table tr:nth-child(even) {
      background-color: #1a1a2e;
    }

    .no-booking {
      color: #0f3460;
      margin-top: 30px;
      font-size: 1.1rem;
    }

    .back-link {
      margin-top: 25px;
      display: inline-block;
      color: #00d1ff;
      font-weight: bold;
      text-decoration: none;
      transition: 0.3s;
    }

    .back-link:hover {
      color: #00bbdd;
      text-decoration: underline;
    }

    footer {
      background-color: #0f2027;
      text-align: center;
      padding: 20px;
      font-size: 0.9rem;
      color: #ccc;
    }

    @media (max-width: 600px) {
      .booking-table {
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>

  <section class="bookings-section">
    <h2>My Appointments</h2>

    <?php if (mysqli_num_rows($result) > 0) { ?>
    <table class="booking-table">
      <tr>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Booked On</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?= $row['appointment_date'] ?></td>
          <td><?= $row['appointment_time'] ?></td>
          <td><?= $row['status'] ?></td>
          <td><?= $row['created_at'] ?></td>
        </tr>
      <?php } ?>
    </table>
    <?php } else { ?>
      <p class="no-booking">🚫 You have no bookings yet. Please book an appointment.</p>
    <?php } ?>

    <a class="back-link" href="dashboard.php">⬅ Back to Dashboard</a>
  </section>

  <footer>
    <p>&copy; 2025 Electrician Booking System | Made with ⚡ by Priyanshu</p>
  </footer>
</body>
</html>