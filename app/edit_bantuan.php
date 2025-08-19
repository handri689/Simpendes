<?php
// Koneksi ke database
include('koneksi.php');

// Mendapatkan ID dari URL
if (isset($_GET['id_penerima'])) {
    $id = $_GET['id_penerima'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM bantuan WHERE id_penerima= '$id'");
    $data = mysqli_fetch_array($query);

    if (!$data) {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak ditemukan!";
    exit;
}

// Proses update data jika form disubmit
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat= $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $jenis_bantuan = $_POST['jenis_bantuan'];
    $tanggal_terima = $_POST['tanggal_terima'];
    $jumlah_bantuan = $_POST['jumlah_bantuan'];
    $status_penerimaan = $_POST['status_penerimaan'];

    // Query untuk mengupdate data
    $update = mysqli_query($koneksi, "UPDATE bantuan SET 
    nama = '$nama', 
    jenis_kelamin = '$jenis_kelamin', 
    alamat = '$alamat', 
    no_telepon = '$no_telepon', 
    jenis_bantuan = '$jenis_bantuan', 
    tanggal_terima = '$tanggal_terima', 
    jumlah_bantuan = '$jumlah_bantuan',  /* Koma ditambahkan di sini */
    status_penerimaan = '$status_penerimaan' 
    WHERE id_penerima= '$id'");


    if ($update) {
        echo "<script>alert('Data berhasil diupdate!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Bantuan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Data Bantuan</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
        </div>
        <div class="form-group">
    <label>Jenis Kelamin</label>
    <select class="form-control form-control-lg" name="jenis_kelamin" required>
   <option value="L">L</option>
   <option value="P">P</option>
</select>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
        </div>
        <div class="form-group">
            <label>NO Telepon</label>
            <input type="text" name="no_telepon" class="form-control" value="<?php echo $data['no_telepon']; ?>" required>
        </div>
        <div class="form-group">
            <label>Jenis Bantuan</label>
            <input type="text" name="jenis_bantuan" class="form-control" value="<?php echo $data['jenis_bantuan']; ?>" required>
        </div>
        <div class="form-group">
            <label>Tanggal Terima</label>
            <input type="text" name="tanggal_terima" class="form-control" value="<?php echo $data['tanggal_terima']; ?>" required>
        </div>
        <div class="form-group">
            <label>Jumlah Bantuan</label>
            <input type="text" name="jumlah_bantuan" class="form-control" value="<?php echo $data['jumlah_bantuan']; ?>" required>
        </div>
    <div class="form-group">
    <label>Status Penerimaan </label>
    <select class="form-control form-control-lg" name="status_penerimaan" required>
   <option value="Sudah Diterima">Sudah Diterima</option>
   <option value="Belum Diterima">Belum Diterima</option>
</select>
 <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="data_bantuan.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
