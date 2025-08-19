<?php
	$koneksi = new mysqli ("127.0.0.1:3307","root",'',"sidkdd");

	$tanggal = date("m/y");
	$tgl = date("d/m/y");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK LAPORAN DATA PENDUDUK DESA COAL</title>
</head>

<body>
	<center>
		<h2>PEMERINTAH KABUPATEN MANGGARAI BARAT</h2>
		<h3>KECAMATAN KUWUS
			<br>DESA COAL</h3>
		<p>________________________________________________________________________</p>

		<h4><u>LAPORAN DATA PENDUDUK DESA COAL</u></h4>
	</center>

	<table border="1" cellpadding="10" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Nama Ayah</th>
				<th>Nama Ibu</th>
				<th>JK</th>
				<th>Alamat</th>
				<th>No KK</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = "SELECT p.id_pend, p.nik, p.nama, p.nm_ayah_pdd, p.nm_ibu_pdd, p.jekel, p.desa, p.rt, p.rw, a.id_kk, k.no_kk, k.kepala 
						FROM tb_pdd p 
						LEFT JOIN tb_anggota a ON p.id_pend=a.id_pend 
						LEFT JOIN tb_kk k ON a.id_kk=k.id_kk 
						WHERE p.status='Ada'";
				
				$query = mysqli_query($koneksi, $sql);
				$no = 1;
				while ($data = mysqli_fetch_array($query)) {
			?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $data['nik']; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['nm_ayah_pdd']; ?></td>
					<td><?php echo $data['nm_ibu_pdd']; ?></td>
					<td><?php echo $data['jekel']; ?></td>
					<td><?php echo $data['desa']; ?> RT <?php echo $data['rt']; ?>/ RW <?php echo $data['rw']; ?>.</td>
					<td><?php echo $data['no_kk']; ?> - <?php echo $data['kepala']; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<br>
	<br>
	<p align="right">
		Desa Coal, <?php echo $tgl; ?><br>
		KEPALA DESA ...............
		<br><br><br><br><br><br><br>
		(....................................................)
	</p>

	<script>
		window.print();
	</script>

</body>

</html>
