<?php
	include "C:/xampp/htdocs/SIMPENDES/inc/koneksi.php";

	$tanggal = date("m/y");
	$tgl = date("d/m/y");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>LAPORAN DATA PENDATANG</title>
</head>

<body>
	<center>
		<h2>PEMERINTAH KABUPATEN MANGGARAI BARAT</h2>
		<h3>KECAMATAN KUWUS
			<br>DESA COAL</h3>
		<p>________________________________________________________________________</p>

		<h4>
			<u>LAPORAN SELURUH DATA PENDATANG</u>
		</h4>
	</center>

	<table border="1" cellspacing="0" cellpadding="5" style="width: 100%; margin-top: 20px;">
		<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Tanggal Datang</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql_tampil = "SELECT * FROM tb_datang";
				$query_tampil = mysqli_query($koneksi, $sql_tampil);
				$no = 1;
				while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
			?>
			<tr>
				<td align="center"><?php echo $no++; ?></td>
				<td><?php echo $data['nik']; ?></td>
				<td><?php echo $data['nama_datang']; ?></td>
				<td><?php echo $data['jekel']; ?></td>
				<td><?php echo $data['tgl_datang']; ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>

	<br>
	<p align="right">
		Coal,
		<?php echo $tgl; ?>
		<br> KEPALA DESA ...............
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>(....................................................)
	</p>

	<script>
		window.print();
	</script>

</body>

</html>
