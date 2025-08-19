<?php
$koneksi = new mysqli ("127.0.0.1:3307","root",'',"sidkdd");

// Getting the selected ID to print data for specific record
if (isset($_POST['Cetak'])) {
    $id = $_POST['id_bantuan'];
}

$tanggal = date("m/y");
$tgl = date("d/m/y");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"><?php
	$koneksi = new mysqli ("127.0.0.1:3307","root",'',"sidkdd");

	$tanggal = date("m/y");
	$tgl = date("d/m/y");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK LAPORAN BANTUAN</title>
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
                <th>Jenis Bantuan</th>
				<th>Tanggal</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$no = 1;
                $sql_tampil ="SELECT b.id_bantuan, b.jenis_bantuan, b.tanggal_bantuan, b.keterangan, p.nik, p.nama 
                       FROM tb_penerima_bantuan b
                       INNER JOIN tb_pdd p ON b.id_pdd = p.id_pend";

				
				$query_tampil = mysqli_query($koneksi, $sql_tampil);
				
				while ($data = mysqli_fetch_array($query_tampil, MYSQLI_BOTH)) {
			?>
			<tr>
				<td align="center"><?php echo $no++; ?></td>
				<td><?php echo $data['nik']; ?></td>
				<td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['jenis_bantuan']; ?></td>
				<td><?php echo $data['tanggal_bantuan']; ?></td>
				<td><?php echo $data['keterangan']; ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	
	<br>
	<br>
	<p align="right">
		Coal, <?php echo $tgl; ?>
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
