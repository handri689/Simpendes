<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT b.id_bantuan, b.jenis_bantuan, b.tanggal_bantuan, b.keterangan, p.nik, p.nama 
                FROM tb_penerima_bantuan b 
                INNER JOIN tb_pdd p 
                ON b.id_pdd = p.id_pend 
                WHERE b.id_bantuan='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);

    if ($query_cek && mysqli_num_rows($query_cek) > 0) {
        $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    } else {
        $data_cek = null; // Tambahkan fallback jika data tidak ditemukan
    }
}
?>

	
	<div class="card card-success">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fa fa-edit"></i> Ubah Data</h3>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="card-body">
	
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">No Sistem</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="id_bantuan" name="id_bantuan" value="<?php echo $data_cek['id_bantuan']; ?>"
						 readonly/>
					</div>
				</div>
	
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
						 readonly required>
					</div>
				</div>
	
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Tgl Terima</label>
					<div class="col-sm-3">
						<input type="date" class="form-control" id="tanggal_bantuan" name="tanggal_bantuan" value="<?php echo $data_cek['tanggal_bantuan']; ?>"
						 required>
					</div>
				</div>
				<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Bantuan</label>
				<div class="col-sm-3">
					<select name="jenis_bantuan" id="jenis_bantuan" class="form-control">
						<option>PKH</option>
						<option>BLT</option>
					</select>
				</div>
			</div>
	
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Keterangan</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data_cek['keterangan']; ?>"
						 required>
					</div>
				</div>
	
			</div>
			<div class="card-footer">
				<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
				<a href="?page=data-bantuan" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>
	
	<?php
	
		if (isset ($_POST['Ubah'])){
			$sql_ubah = "UPDATE tb_penerima_bantuan SET 
			tanggal_bantuan='".$_POST['tanggal_bantuan']."',
			jenis_bantuan='".$_POST['jenis_bantuan']."',
			keterangan='".$_POST['keterangan']."'
			WHERE id_bantuan='".$_POST['id_bantuan']."'";		
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
		mysqli_close($koneksi);
	
		if ($query_ubah) {
			echo "<script>
		  Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
		  }).then((result) => {if (result.value)
			{window.location = 'index.php?page=data-bantuan';
			}
		  })</script>";
		  }else{
		  echo "<script>
		  Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
		  }).then((result) => {if (result.value)
			{window.location = 'index.php?page=data-bantuan';
			}
		  })</script>";
		}}
	