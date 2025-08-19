<?php
	$koneksi = new mysqli ("127.0.0.1:3307","root",'',"sidkdd");

	$tanggal = date("m/y");
	$tgl = date("d/m/y");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK LAPORAN PENDUDUK PINDAH</title>
</head>

<body>
	<center>

		<h2>PEMERINTAH KABUPATEN MANGGARAI BARAT</h2>
		<h3>KECAMATAN KUWUS
			<br>DESA COAL</h3>
		<p>________________________________________________________________________</p>

	</center>

	<center>
		<h4>
			<u>LAPORAN DATA PENDUDUK PINDAH</u>
		</h4>
		<h4>No Surat : /Lap.Pindah/<?php echo $tgl; ?></h4>
	</center>


	<table border="1" cellpadding="5" cellspacing="0" style="width: 100%; border-collapse: collapse;">
		<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Tanggal Pindah</th>
				<th>Alasan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql_tampil = "SELECT p.id_pend, p.nik, p.nama, d.tgl_pindah, d.alasan FROM tb_pindah d INNER JOIN tb_pdd p ON p.id_pend = d.id_pdd";
				$query_tampil = mysqli_query($koneksi, $sql_tampil);
				$no = 1;
				while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
			?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $data['nik']; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['tgl_pindah']; ?></td>
					<td><?php echo $data['alasan']; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>


	<br><br><br><br><br>
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
