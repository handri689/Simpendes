<?php
include('../../conf/config.php');

$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$tanggal_pindah = mysqli_real_escape_string($koneksi, $_POST['tanggal_pindah']);
$jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
$tujuan = mysqli_real_escape_string($koneksi, $_POST['tujuan']);
$nik = mysqli_real_escape_string($koneksi, $_POST['nik']);



$query = mysqli_query($koneksi, "INSERT INTO pindah (nama, tanggal_pindah, jenis_kelamin, tujuan, nik) 
    VALUES ('$nama', '$tanggal_pindah', '$jenis_kelamin', '$tujuan', '$nik')");


if($query){
    header('Location:../index.php?page=data_pindah');
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>

