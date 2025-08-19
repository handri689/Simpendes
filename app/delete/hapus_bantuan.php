<?php
include('../../conf/config.php');
$id = $_GET['id_penerima'];


$query = mysqli_query($koneksi,"DELETE FROM bantuan WHERE id_penerima='$id'");

header('Location:../index.php?page=data_bantuan');
?>
