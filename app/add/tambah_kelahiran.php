<?php
include('../../conf/config.php');
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$tempat_lahir  = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']);
$tanggal_lahir = mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']);
$jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
$nama_ayah = mysqli_real_escape_string($koneksi, $_POST['nama_ayah']);
$nama_ibu= mysqli_real_escape_string($koneksi, $_POST['nama_ibu']);
$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

$query = mysqli_query($koneksi, "INSERT INTO kelahiran (id_kelahiran, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, nama_ayah, nama_ibu, alamat) 
    VALUES ('', '$nama', '$tempat_lahir', '$tanggal_lahir','$jenis_kelamin', '$nama_ayah', '$nama_ibu', '$alamat')");

header('Location:../index.php?page=data_kelahiran');
?>
