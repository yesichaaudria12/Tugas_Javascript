<?php
//Get Data From URL
$data=$_GET['id'];

//Koneksi 
$connect=mysqli_connect("localhost", "root", "", "php_kampus_merdeka");
$remove =mysqli_query($connect, "DELETE FROM product WHERE id='$data'");

header("Location:index.php");
?>