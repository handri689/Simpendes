
 <br></br>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- Card for Form -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
 Tambah Data Pendatang
</button>      
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nik</th>
                  <th>Nama Pendatang</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal Datang</th>
                  <th>Alamat Asal</th>
                  <th>Alamat Tujuan</th>
                  <th>Nama Pelapor</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=0;
                $query = mysqli_query($koneksi,"SELECT * FROM pendatang");
                while($dpng = mysqli_fetch_array($query)){
                  $no++;
                  ?>
                <tr>
                  <td width='1%'><?php echo $no;?></td>
                  <td width='5%'><?php echo $dpng['nik'];?></td>
                  <td width='5%'><?php echo $dpng['nama_pendatang'];?></td>
                  <td width='5%'><?php echo $dpng['jenis_kelamin'];?></td>
                  <td width='5%'><?php echo $dpng['tanggal_datang'];?></td>
                  <td width='5%'><?php echo $dpng['alamat_asal'];?></td>
                  <td width='5%'><?php echo $dpng['alamat_tujuan'];?></td>
                  <td width='5%'><?php echo $dpng['nama_pelapor'];?></td>
                  <td width='10%'>
                  <a href="edit_pendatang.php?id_pendatang=<?php echo $dpng['id_pendatang']; ?>" class="btn btn-warning btn-sm d-inline-block" style="width: 80px;">
                  <i class="  fas fa-edit "></i> Edit
                   <a href="delete/hapus_pendatang.php?id_pendatang=<?php echo $dpng['id_pendatang']; ?>" class="btn btn-danger btn-sm d-inline-block" style="width: 80px;" onclick="return confirm('Yakin ingin menghapus data ini?')">
                   <i class="fas fa-trash"></i>Hapus</a>

                  </td>
                </tr>
                <?php }
                ?>
                
    </div>
    <!-- /.container-fluid -->
  </section>
  <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Pendatang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="add/tambah_datang.php">
    <div class="modal-body">
        <div class="form-row">
            <input class="form-control form-control-lg" type="text" placeholder="Nik" name="nik" required>
            <input class="form-control form-control-lg" type="text" placeholder="Nama_pendatang" name="nama_pendatang" required>
            <select class="form-control form-control-lg" name="jenis_kelamin" required>
               <option value="P">P</option>
               <option value="L">L</option>
               </select>
            <input class="form-control form-control-lg" type="text" placeholder="Tanggal_datang" name="tanggal_datang" required>
            <input class="form-control form-control-lg" type="text" placeholder="Alamat_asal" name="alamat_asal" required>
            <input class="form-control form-control-lg" type="text" placeholder="Alamat_tujuan" name="alamat_tujuan" required>
            <input class="form-control form-control-lg" type="text" placeholder="Nama_pelapor" name="nama_pelapor" required>  
       
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
          </div>
  <!-- /.content -->
      
  <!-- /.content -->
