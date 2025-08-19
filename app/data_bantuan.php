
 <br></br>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- Card for Form -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
 Tambah Data Bantuan 
</button>      
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Alamat</th>
                  <th>No TLP</th>
                  <th>Jenis Bantuan</th>
                  <th>Tanggal Terima</th>
                  <th>Jumlah Bantuan</th> 
                  <th>Status Penerimaan</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=0;
                $query = mysqli_query($koneksi,"SELECT * FROM bantuan");
                while($btn = mysqli_fetch_array($query)){
                  $no++;
                  ?>

                <tr>
                  <td width='1%'><?php echo $no;?></td>
                  <td width='5%'><?php echo $btn['nama'];?></td>
                  <td width='5%'><?php echo $btn['jenis_kelamin'];?></td>
                  <td width='5%'><?php echo $btn['alamat'];?></td>
                  <td width='5%'><?php echo $btn['no_telepon'];?></td>
                  <td width='5%'><?php echo $btn['jenis_bantuan'];?></td>
                  <td width='5%'><?php echo $btn['tanggal_terima'];?></td>
                  <td width='5%'><?php echo $btn['jumlah_bantuan'];?></td>
                  <td width='5%'><?php echo $btn['status_penerimaan'];?></td>
                  <td width='10%'>
                  <a href="edit_bantuan.php?id_penerima=<?php echo $btn['id_penerima']; ?>" class="btn btn-warning btn-sm d-inline-block" style="width: 80px;">
                    <i class="  fas fa-edit "></i> Edit
                  <a href="delete/hapus_bantuan.php?id_penerima=<?php echo $btn['id_penerima']; ?>" class="btn btn-danger btn-sm d-inline-block" style="width: 80px;" onclick="return confirm('Yakin ingin menghapus data ini?')">
                  <i class="fas fa-trash"></i>Hapus</a>

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
              <h4 class="modal-title">Tambah Data Bantuan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="add/tambah_bantuan.php">
    <div class="modal-body">
        <div class="form-row">
            <input class="form-control form-control-lg" type="text" placeholder="Nama" name="nama" required>
            <select class="form-control form-control-lg" name="jenis_kelamin" required>
               <option value="P">P</option>
               <option value="L">L</option>
               </select>
            <input class="form-control form-control-lg" type="text" placeholder="Alamat" name="alamat" required>
            <input class="form-control form-control-lg" type="text" placeholder="No_telepon" name="no_telepon" required>
            <input class="form-control form-control-lg" type="text" placeholder="Jenis_bantuan" name="jenis_bantuan" required>
            <input class="form-control form-control-lg" type="text" placeholder="Tanggal_terima" name="tanggal_terima" required>
            <input class="form-control form-control-lg" type="text" placeholder="Jumlah_bantuan" name="jumlah_bantuan" required>
            <select class="form-control form-control-lg" name="status_penerimaan" required>
               <option value="Sudah Diterima">Sudah Diterima</option>
               <option value="Belum Diterima">Belum Diterima</option>
               </select>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
          </div>
  <!-- /.content -->
