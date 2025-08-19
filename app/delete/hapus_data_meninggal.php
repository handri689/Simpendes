<?php
include('../../conf/config.php');
$id = $_GET['id_meninggal'];


$query = mysqli_query($koneksi,"DELETE FROM db_meninggal WHERE id_meninggal='$id'");

header('Location:../index.php?page=data_kematian');
?>
