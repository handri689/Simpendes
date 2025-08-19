
 <br></br>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- Card for Form -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
 Tambah Data Kelahiran
</button>      
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tempat Lahir</th>
                  <th>TGL Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Nama Ayah</th>
                  <th>Nama Ibu</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=0;

                $query = mysqli_query($koneksi,"SELECT * FROM kelahiran");
                while($klhn = mysqli_fetch_array($query)){
                  $no++;
                  ?>

                <tr>
                  <td width='1%'><?php echo $no;?></td>
                  <td width='5%'><?php echo $klhn['nama'];?></td>
                  <td width='5%'><?php echo $klhn['tempat_lahir'];?></td>
                  <td width='5%'><?php echo $klhn['tanggal_lahir'];?></td>
                  <td width='5%'><?php echo $klhn['jenis_kelamin'];?></td>
                  <td width='5%'><?php echo $klhn['nama_ayah'];?></td>
                  <td width='5%'><?php echo $klhn['nama_ibu'];?></td>
                  <td width='5%'><?php echo $klhn['alamat'];?></td>
                  <td width='10%'>
                  <a href="edit_kelahiran.php?id_kelahiran=<?php echo $klhn['id_kelahiran']; ?>" class="btn btn-warning btn-sm d-inline-block" style="width: 80px;"><i class="  fas fa-edit "></i> Edit

<a href="delete/hapus_kelahiran.php?id_kelahiran=<?php echo $klhn['id_kelahiran']; ?>" class="btn btn-danger btn-sm d-inline-block" style="width: 80px;" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i>Hapus</a>

                  </td>
                </tr>
                <?php }
                ?>
                </tbody>
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
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="add/tambah_kelahiran.php">
    <div class="modal-body">
        <div class="form-row">
            <input class="form-control form-control-lg" type="text" placeholder="Nama" name="nama" required>
            <input class="form-control form-control-lg" type="text" placeholder="Tempat_lahir" name="tempat_lahir" required>
            <input class="form-control form-control-lg" type="text" placeholder="Tanggal_lahir" name="tanggal_lahir" required>
            <select class="form-control form-control-lg" name="jenis_kelamin" required>
               <option value="P">P</option>
               <option value="L">L</option>
               </select>
            <input class="form-control form-control-lg" type="text" placeholder="Nama_ayah" name="nama_ayah" required>
            <input class="form-control form-control-lg" type="text" placeholder="Nama_ibu" name="nama_ibu" required>
            <input class="form-control form-control-lg" type="text" placeholder="Alamat" name="alamat" required>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
          </div>
  <!-- /.content -->
