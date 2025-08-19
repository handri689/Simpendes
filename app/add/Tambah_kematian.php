<?php
include('../../conf/config.php');

$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$tangagl_lahir = mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']);
$tanggal_meninggal = mysqli_real_escape_string($koneksi, $_POST['tanggal_meninggal']);
$jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$penyebap_kematian = mysqli_real_escape_string($koneksi, $_POST['penyebap_kematian']);
$tempat_meninggal = mysqli_real_escape_string($koneksi, $_POST['tempat_meninggal']);
$nama_pelapor = mysqli_real_escape_string($koneksi, $_POST['nama_pelapor']);


$query = mysqli_query($koneksi, "INSERT INTO db_meninggal (nama, tanggal_lahir, tanggal_meninggal, jenis_kelamin, alamat, penyebap_kematian, tempat_meninggal, nama_pelapor) 
    VALUES ('$nama', '$tangagl_lahir', '$tanggal_meninggal', '$jenis_kelamin', '$alamat', '$penyebap_kematian', '$tempat_meninggal', '$nama_pelapor')");


if($query){
    header('Location:../index.php?page=data_kematian');
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>

