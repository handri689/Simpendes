<?php
	$koneksi = new mysqli ("127.0.0.1:3307","root",'',"sidkdd");

	$tanggal = date("m/y");
	$tgl = date("d/m/y");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK LAPORAN KEMATIAN</title>
</head>

<body>
	<center>

		<h2>PEMERINTAH KABUPATEN MANGGARAI BARAT</h2>
		<h3>KECAMATAN KUWUS
			<br>DESA COAL</h3>
		<p>________________________________________________________________________</p>

		<h4>
			<u>LAPORAN DATA KEMATIAN</u>
		</h4>
		<h4>Per Tanggal: <?php echo $tgl; ?></h4>
	</center>
	
	<table border="1" width="100%" cellpadding="5" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Tanggal Meninggal</th>
				<th>Sebab</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
				$sql_tampil = "SELECT p.nik, p.nama, m.tgl_mendu, m.sebab 
							   FROM tb_mendu m 
							   INNER JOIN tb_pdd p ON p.id_pend = m.id_pdd";
				
				$query_tampil = mysqli_query($koneksi, $sql_tampil);
				
				while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
			?>
			<tr>
				<td align="center"><?php echo $no++; ?></td>
				<td><?php echo $data['nik']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['tgl_mendu']; ?></td>
				<td><?php echo $data['sebab']; ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	
	<br>
	<br>
	<p align="right">
		Wonokasihan, <?php echo $tgl; ?>
		<br> KEPALA DESA ...............
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
