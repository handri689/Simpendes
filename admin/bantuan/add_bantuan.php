<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Bantuan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Penduduk</label>
				<div class="col-sm-6">
					<select name="id_pdd" id="id_pdd" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Penduduk -</option>
						<?php
				// ambil data dari database
				$query = "select * from tb_pdd where status='Ada'";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
						<option value="<?php echo $row['id_pend'] ?>">
							<?php echo $row['nik'] ?>
							-
							<?php echo $row['nama'] ?>
						</option>
						<?php
				}
				?>
					</select>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tgl Terima</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tanggal_bantuan" name="tanggal_bantuan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Bantuan</label>
				<div class="col-sm-3">
					<select name="jenis_bantuan" id="jenis_bantuan" class="form-control">
						<option>- Pilih -</option>
						<option>PKH</option>
						<option>BLT</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Alasan Terima" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-bantuan" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
    $sql_simpan = "INSERT INTO tb_penerima_bantuan (id_pdd, tanggal_bantuan,jenis_bantuan, keterangan) VALUES (
        '".$_POST['id_pdd']."',
        '".$_POST['tanggal_bantuan']."',
		'".$_POST['jenis_bantuan']."',
        '".$_POST['keterangan']."')";
    
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    
    // Update status penduduk setelah menerima bantuan
    $sql_ubah = "UPDATE tb_pdd SET 
        status='bantuan'
        WHERE id_pend='".$_POST['id_pdd']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    
    // Tutup koneksi
    mysqli_close($koneksi);

    if ($query_simpan && $query_ubah) {
        echo "<script>
        Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            window.location = 'index.php?page=data-bantuan';
            }
        })</script>";
    } else {
        echo "<script>
        Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            window.location = 'index.php?page=add-bantuan';
            }
        })</script>";
    }
}
?>
