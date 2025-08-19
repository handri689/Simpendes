<?php
	$koneksi = new mysqli ("127.0.0.1:3307","root",'',"sidkdd");


	// Date format for report generation
	$tanggal = date("m/y");
	$tgl = date("d/m/y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cetak Laporan Data Kelahiran</title>
</head>
<body>
	<center>
		<h2>PEMERINTAH KABUPATEN MANGGARAI BARAT</h2>
		<h3>KECAMATAN KUWUS
			<br>DESA COAL</h3>
		<p>________________________________________________________________________</p>

		<h4><u>LAPORAN DATA KELAHIRAN</u></h4>
		<h4>Tanggal Laporan : <?php echo $tgl; ?></h4>
	</center>


	<table border="1" cellpadding="5" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>No. KK - Kepala Keluarga</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Query to fetch birth data along with family card information
				$sql = $koneksi->query("SELECT l.id_lahir, l.nama, l.tgl_lh, l.jekel, k.no_kk, k.kepala 
										FROM tb_lahir l 
										INNER JOIN tb_kk k ON k.id_kk = l.id_kk");
				$no = 1;
				while ($data = $sql->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['tgl_lh']; ?></td>
					<td><?php echo $data['jekel']; ?></td>
					<td><?php echo $data['no_kk']; ?> - <?php echo $data['kepala']; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<br><br><br><br>
	<p align="right">
		Desa Coal, <?php echo $tgl; ?><br>
		KEPALA DESA ...............
		<br><br><br><br>
		<br>
		<br>
		<br>
		<br>(....................................................)
	</p>

	<script>
		// Trigger print dialog box when page is loaded
		window.print();
	</script>
</body>
</html>
