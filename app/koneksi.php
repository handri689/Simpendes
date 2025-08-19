<?php
$host = "localhost"; // Nama host
$user = "root"; // Username database
$password = ""; // Password database
$database = "db_sippendess"; // Nama database

$koneksi = mysqli_connect('localhost','root','','db_sippendess');

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
