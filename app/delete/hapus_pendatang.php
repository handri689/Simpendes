<?php
include('../../conf/config.php');
$id = $_GET['id_pendatang'];


$query = mysqli_query($koneksi,"DELETE FROM pendatang WHERE id_pendatang='$id'");

header('Location:../index.php?page=data_pendatang');
?>
