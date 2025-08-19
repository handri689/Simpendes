
<br></br>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- Card for Form -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
 Tambah Data 
</button>      
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No </th>
                  <th>No KK</th>
                  <th>Kepala Keluarga</th>
                  <th>Alamat</th>
                  <th>RT/RW</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=0;

                $query = mysqli_query($koneksi,"SELECT * FROM kartu_keluarga");
                while($klrg = mysqli_fetch_array($query)){
                  $no++;
                  ?>

                <tr>
                  <td width='1%'><?php echo $no;?></td>
                  <td width='5%'><?php echo $klrg['no_kk'];?></td>
                  <td width='5%'><?php echo $klrg['kepala_keluarga'];?></td>
                  <td width='5%'><?php echo $klrg['alamat'];?></td>
                  <td width='5%'><?php echo $klrg['rt_rw'];?></td>
                  <td width='10%'>
<a href="add/lihat_keluarga.php?no_kk=<?= $klrg['no_kk']; ?>" class="btn btn-warning btn-sm d-inline-block" style="width: 60px;">
    <i class="fas fa-users"></i> Anggota
</a>
<a href="edit_keluarga.php?id_kk=<?php echo $klrg['id_kk']; ?>" class="btn btn-warning btn-sm d-inline-block" style="width: 60px;"><i class="fas fa-edit "></i> Edit
<a href="hapus_keluarga.php?id_kk=<?php echo $klrg['id_kk']; ?>" class="btn btn-danger btn-sm d-inline-block" style="width: 60px;" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i>Hapus</a>

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
              <h4 class="modal-title">Tambah Data Keluarga</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="add/Tambah_Keluarga.php">
    <div class="modal-body">
        <div class="form-row">
            <input class="form-control form-control-lg" type="text" placeholder="No_kk" name="no_kk" required>
            <input class="form-control form-control-lg" type="text" placeholder="Kepala_keluarga" name="kepala_keluarga" required>
            <input class="form-control form-control-lg" type="text" placeholder="Alamat" name="alamat" required>
            <input class="form-control form-control-lg" type="text" placeholder="Rt_rw" name="rt_rw" required>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
          </div>
  <!-- /.content -->
