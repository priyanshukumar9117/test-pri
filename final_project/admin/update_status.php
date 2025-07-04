<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include("../includes/db_connect.php");

$id = $_GET['id'];
$status = $_GET['status'];

if (in_array($status, ['Approved', 'Cancelled'])) {
    $query = "UPDATE appointments SET status='$status' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
    } else {
        echo "Update failed.";
    }
} else {
    echo "Invalid status value.";
}
