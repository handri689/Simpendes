<?php
include('../../conf/config.php');
$id = $_GET['id_desa'];


$query = mysqli_query($koneksi,"DELETE FROM info_desa WHERE id_desa='$id'");

header('Location:../index.php?page=info_desa');
?>
