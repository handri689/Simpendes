<?php
// Koneksi ke database
include('../../conf/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST')  // Memeriksa jika form disubmit
    $no_kk = mysqli_real_escape_string($koneksi, $_POST['no_kk']);
    $kepala_keluarga = mysqli_real_escape_string($koneksi, $_POST['kepala_keluarga']); // Perbaikan spasi
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $rt_rw = mysqli_real_escape_string($koneksi, $_POST['rt_rw']);
    $kelurahan = mysqli_real_escape_string($koneksi, $_POST['kelurahan']);
    $kecamatan = mysqli_real_escape_string($koneksi, $_POST['kecamatan']);
    $kabupaten = mysqli_real_escape_string($koneksi, $_POST['kabupaten']);
    $provinsi = mysqli_real_escape_string($koneksi, $_POST['provinsi']);
    $query = "INSERT INTO kartu_keluarga (no_kk, kepala_keluarga, alamat, rt_rw, kelurahan, kecamatan, kabupaten, provinsi) 
              VALUES ('$no_kk', '$kepala_keluarga', '$alamat', '$rt_rw', '$kelurahan', '$kecamatan', '$kabupaten', '$provinsi')";

if($query){
    header('Location:../index.php?page=data_keluarga');
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
