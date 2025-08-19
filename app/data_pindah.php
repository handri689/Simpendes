
 <br></br>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- Card for Form -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
 Tambah Data Pindah
</button>      
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tanggal Pindah </th>
                  <th>Jenis Kelamin</th>
                  <th>Tujuan</th>
                  <th>Nik</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
               $no=0;
               $query = mysqli_query($koneksi,"SELECT * FROM pindah");
               while($pndh = mysqli_fetch_array($query)){
                 $no++;
                 ?>
                <tr>
                  <td width='1%'><?php echo $no;?></td>
                  <td width='5%'><?php echo $pndh['nama'];?></td>
                  <td width='5%'><?php echo $pndh['tanggal_pindah'];?></td>
                  <td width='5%'><?php echo $pndh['jenis_kelamin'];?></td>
                  <td width='5%'><?php echo $pndh['nik'];?></td>
                  <td width='5%'><?php echo $pndh['tujuan'];?></td>
                  <td width='10%'>
                  <a href="edit_pindah.php?id_pindah=<?php echo $pndh['id_pindah']; ?>" class="btn btn-warning btn-sm d-inline-block" style="width: 80px;">
                  <i class="  fas fa-edit "></i> Edit
                   <a href="delete/hapus_pindah.php?id_pindah=<?php echo $pndh['id_pindah']; ?>" class="btn btn-danger btn-sm d-inline-block" style="width: 80px;" onclick="return confirm('Yakin ingin menghapus data ini?')">
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
              <h4 class="modal-title">Tambah Data Pindah</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="add/tambah_pindah.php">
    <div class="modal-body">
        <div class="form-row">
            <input class="form-control form-control-lg" type="text" placeholder="Nama" name="nama" required>
            <input class="form-control form-control-lg" type="text" placeholder="Tanggal_pindah" name="tanggal_pindah" required>
            <select class="form-control form-control-lg" name="jenis_kelamin" required>
               <option value="P">P</option>
               <option value="L">L</option>
               </select>
            <input class="form-control form-control-lg" type="text" placeholder="Tujuan" name="tujuan" required>
            <input class="form-control form-control-lg" type="text" placeholder="Nik" name="nik" required>
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
