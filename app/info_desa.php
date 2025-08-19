
<br></br>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- Card for Form -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
 Tambah Data Info Desa
</button>      
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama </th>
                  <th>Jabatan</th>
                  <th>Jenis Kelamin</th>
                  <th>Pendidikan Terakhir</th>
                  <th>Status</th>
                  <th>Gambar</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=0;

                $query = mysqli_query($koneksi,"SELECT * FROM info_desa");
                while($info = mysqli_fetch_array($query)){
                  $no++;
                  ?>
                <tr>
                  <td width='1%'><?php echo $no;?></td>
                  <td width='5%'><?php echo $info['nama'];?></td>
                  <td width='5%'><?php echo $info['jabatan'];?></td>
                  <td width='5%'><?php echo $info['jenis_kelamin'];?></td>
                  <td width='5%'><?php echo $info['pendidikan_terakhir'];?></td>
                  <td width='5%'><?php echo $info['status'];?></td>
                  <td width='5%'>
                  <img src="../app/gambar/gambar_perangkat/<?php echo $info['gambar']; ?>" alt="Gambar" width="50">
                  </td>
                  <td width='10%'>
                  <a href="edit_info.php?id_desa=<?php echo $info['id_desa']; ?>" class="btn btn-warning btn-sm d-inline-block" style="width: 80px;">
                  <i class="  fas fa-edit "></i> Edit
<a href="delete/hapus_info.php?id_desa=<?php echo $info['id_desa']; ?>" class="btn btn-danger btn-sm d-inline-block" style="width: 80px;" onclick="return confirm('Yakin ingin menghapus data ini?')">
<i class="fas fa-trash"></i>Hapus</a>

                  </td>
                </tr>
                <?php }
                ?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Info Desa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="add/Tambah_info.php" enctype="multipart/form-data">
  <div class="modal-body">
      <div class="form-row">
          <input class="form-control form-control-lg" type="text" placeholder="Nama" name="nama" required>
          <input class="form-control form-control-lg" type="text" placeholder="Jabatan" name="jabatan" required>
          <select class="form-control form-control-lg" name="jenis_kelamin" required>
              <option value="P">P</option>
              <option value="L">L</option>
          </select>
          <input class="form-control form-control-lg" type="text" placeholder="Pendidikan Terakhir" name="pendidikan_terakhir" required>
          <input class="form-control form-control-lg" type="text" placeholder="Status" name="status" required>
          <!-- Input gambar dengan tipe file -->
          <input class="form-control form-control-lg" type="file" name="gambar" required>
      </div>
  </div>
  <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save changes</button>
  </div>
</form>

          </div>
  <!-- /.content -->
