<?php
include('../../conf/config.php');
$id = $_GET['id_kelahiran'];


$query = mysqli_query($koneksi,"DELETE FROM  kelahiran WHERE id_kelahiran='$id'");

header('Location:../index.php?page=data_kelahiran');
?>
