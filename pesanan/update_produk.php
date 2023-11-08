<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id     = $_POST['id'];
$name   = $_POST['name'];
$price = $_POST['price'];


//query update data ke dalam database berdasarkan ID
$select = "UPDATE product SET id = '$id', name = '$name', price = '$price' WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($conn->query($select)) {
    //redirect ke halaman index.php 
    header("location: index.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupdate!";
}

?>