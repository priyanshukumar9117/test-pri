<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include("../includes/db_connect.php");

$result = mysqli_query($conn, "SELECT a.*, u.name, u.email FROM appointments a JOIN users u ON a.user_id = u.id ORDER BY appointment_date, appointment_time");
?>
<h2>Admin Panel - Manage Appointments</h2>
<table border="1" cellpadding="10">
  <tr>
    <th>User Name</th>
    <th>Email</th>
    <th>Date</th>
    <th>Time</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?= $row['name'] ?></td>
      <td><?= $row['email'] ?></td>
      <td><?= $row['appointment_date'] ?></td>
      <td><?= $row['appointment_time'] ?></td>
      <td><?= $row['status'] ?></td>
      <td>
        <?php if ($row['status'] == 'Pending') { ?>
          <a href="update_status.php?id=<?= $row['id'] ?>&status=Approved">Approve</a> |
          <a href="update_status.php?id=<?= $row['id'] ?>&status=Cancelled">Cancel</a>
        <?php } else { echo "-"; } ?>
      </td>
    </tr>
  <?php } ?>
</table>
<p><a href="logout.php">Logout</a></p>
