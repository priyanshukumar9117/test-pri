<?php
$host = "sql207.infinityfree.com";
$user = "if0_39394152";
$password = "OX9W5RYQ64ppCR";
$db = "if0_39394152_electrician_appointments";
$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
