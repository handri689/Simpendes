<?php
include('../../conf/config.php');

$nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
$nama_pendatang = mysqli_real_escape_string($koneksi, $_POST['nama_pendatang']);
$jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
$tanggal_datang = mysqli_real_escape_string($koneksi, $_POST['tanggal_datang']);
$nama_pelapor = mysqli_real_escape_string($koneksi, $_POST['nama_pelapor']);
$alamat_tujuan = mysqli_real_escape_string($koneksi, $_POST['alamat_tujuan']);
$alamat_asal= mysqli_real_escape_string($koneksi, $_POST['alamat_asal']);


$query = mysqli_query($koneksi, "INSERT INTO pendatang (nik, nama_pendatang, jenis_kelamin, tanggal_datang, alamat_asal,alamat_tujuan, nama_pelapor) 
    VALUES ('$nik', '$nama_pendatang', '$jenis_kelamin', '$tanggal_datang', '$nama_pelapor', '$alamat_tujuan', '$alamat_asal')");


if($query){
    header('Location:../index.php?page=data_pendatang');
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>

