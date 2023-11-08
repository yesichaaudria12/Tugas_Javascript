<?php
include 'koneksi.php';

// get variable from form input
$id = $_POST["id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$created_at = date('Y-m-d h:i:s');

$result = mysqli_query($conn, "INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `phone`, `created_at`) VALUES ('$id', '$first_name', '$last_name', '$email', '$phone', '$created_at');");

header("Location:index.php");
