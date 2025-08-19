<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Bantuan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-bantuan" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Jenis Bantuan</th>
						<th>Tanggal </th>
						<th>Keterangan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT b.id_bantuan, b.jenis_bantuan, b.tanggal_bantuan, b.keterangan, p.nik, p.nama FROM 
        tb_penerima_bantuan b INNER JOIN tb_pdd p ON b.id_pdd = p.id_pend");
              while ($data= $sql->fetch_assoc()) {
            	?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nik']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['jenis_bantuan']; ?>
						</td>
						<td>
							<?php echo $data['tanggal_bantuan']; ?>
						</td>
						<td>
							<?php echo $data['keterangan']; ?>
						</td>
						<td>
							<a href="?page=edit-bantuan&kode=<?php echo $data['id_bantuan']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-bantuan&kode=<?php echo $data['id_bantuan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
			  </a>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->