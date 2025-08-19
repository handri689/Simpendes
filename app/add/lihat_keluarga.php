<?php
// Include the database connection file
include('../../conf/config.php');

// Get the no_kk from the URL
$no_kk = isset($_GET['no_kk']) ? $_GET['no_kk'] : '';

// Query to get family members based on no_kk
$query = mysqli_query($koneksi, "SELECT * FROM anggota_keluarga WHERE no_kk = '$no_kk'");

if (mysqli_num_rows($query) == 0) {
    echo "<h4>Tidak ada anggota keluarga untuk No KK: " . htmlspecialchars($no_kk) . "</h4>";
    exit; // Keluar dari skrip jika tidak ada data
}
?>
<br></br>
<style>
    table {
        border-collapse: collapse; /* Menggabungkan border */
        width: 100%; /* Menyesuaikan lebar tabel */
    }
    th, td {
        border: 2px solid black; /* Border untuk header dan data */
        padding: 8px; /* Jarak dalam sel */
        text-align: left; /* Rata kiri untuk teks */
    }
    th {
        background-color: #f2f2f2; /* Warna latar belakang untuk header */
    }
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- Card for Family Members -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Anggota Keluarga untuk No KK: <?= htmlspecialchars($no_kk); ?></h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anggota</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Hubungan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                while ($anggota = mysqli_fetch_array($query)) {
                                    $no++;
                                    ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= htmlspecialchars($anggota['nama']); ?></td>
                                        <td><?= htmlspecialchars($anggota['jenis_kelamin']); ?></td>
                                        <td><?= htmlspecialchars($anggota['hubungan_keluarga']); ?></td>
                                        <td>
    <a href="edit_anggota.php?id_anggota=<?= htmlspecialchars($anggota['id_anggota']); ?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="hapus_anggota.php?id_anggota=<?= htmlspecialchars($anggota['id_anggota']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
</td>

                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

<?php
// Tutup koneksi jika sudah selesai
mysqli_close($koneksi);
?>

<!-- Add your footer and other necessary HTML here -->
