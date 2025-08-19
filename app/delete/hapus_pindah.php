<?php
include('../../conf/config.php');
$id = $_GET['id_pindah'];


$query = mysqli_query($koneksi,"DELETE FROM pindah WHERE id_pindah='$id'");

header('Location:../index.php?page=data_pindah');
?>
