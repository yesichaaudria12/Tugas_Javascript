<?php
include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');

// get variable from form input
$id = $_POST["id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];

$result = mysqli_query($conn, "UPDATE customer set first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone' where id = '$_GET[id]'");

header("Location:index.php");