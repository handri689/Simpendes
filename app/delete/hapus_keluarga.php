<?php
include('../../conf/config.php');
$id = $_GET['id_kk'];


$query = mysqli_query($koneksi,"DELETE FROM kartu_keluarga WHERE id_kk='$id'");

header('Location:../index.php?page=data_keluarga');
?>
