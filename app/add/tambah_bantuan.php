<?php
include('../../conf/config.php');
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
$alamat  = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$no_telepon = mysqli_real_escape_string($koneksi, $_POST['no_telepon']);
$jenis_bantuan = mysqli_real_escape_string($koneksi, $_POST['jenis_bantuan']);
$tanggal_terima = mysqli_real_escape_string($koneksi, $_POST['tanggal_terima']);
$jumlah_bantuan = mysqli_real_escape_string($koneksi, $_POST['jumlah_bantuan']);
$status_penerimaan = mysqli_real_escape_string($koneksi, $_POST['status_penerimaan']);

$query = mysqli_query($koneksi, "INSERT INTO bantuan (id_penerima, nama, jenis_kelamin, alamat, no_telepon, jenis_bantuan, tanggal_terima, jumlah_bantuan, status_penerimaan) 
    VALUES ('', '$nama', '$jenis_kelamin', '$alamat', '$no_telepon', '$jenis_bantuan','$tanggal_terima', '$jumlah_bantuan','$status_penerimaan')");

header('Location:../index.php?page=data_bantuan');
?>
