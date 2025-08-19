<?php
// Koneksi ke database
include('koneksi.php');

// Mendapatkan ID dari URL
if (isset($_GET['id_pendatang'])) {
    $id = $_GET['id_pendatang'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM pendatang WHERE id_pendatang= '$id'");
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
    $nik = $_POST['nik'];
    $nama_pendatang= $_POST['nama_pendatang'];
    $tanggal_datang = $_POST['tanggal_datang'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat_asal = $_POST['alamat_asal'];
    $alamat_tujuan = $_POST['alamat_tujuan'];
    $nama_pelapor = $_POST['nama_pelapor'];

    // Query untuk mengupdate data
    $update = mysqli_query($koneksi, "UPDATE pendatang SET 
    nik='$nik',
    nama_pendatang = '$nama_pendatang', 
    tanggal_datang = '$tanggal_datang', 
    jenis_kelamin = '$jenis_kelamin', 
    alamat_asal = '$alamat_asal', 
    alamat_tujuan = '$alamat_tujuan',
    nama_pelapor = '$nama_pelapor' 
    WHERE id_pendatang= '$id'");


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
    <title>Edit Data Pendatang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Data Pendatang</h2>
    <form method="POST">
    <div class="form-group">
            <label>Nik</label>
            <input type="text" name="nik" class="form-control" value="<?php echo $data['nik']; ?>" required>
        </div>
        <div class="form-group">
            <label>Nama Pendatang</label>
            <input type="text" name="nama_pendatang" class="form-control" value="<?php echo $data['nama_pendatang']; ?>" required>
        </div>
        <div class="form-group">
            <label>Tanggal Datang</label>
            <input type="text" name="tanggal_datang" class="form-control" value="<?php echo $data['tanggal_datang']; ?>" required>
        </div>
    <div class="form-group">
    <label>Jenis Kelamin</label>
    <select class="form-control form-control-lg" name="jenis_kelamin" required>
   <option value="L">L</option>
   <option value="P">P</option>
</select>


        <div class="form-group">
            <label>Alamat Asal</label>
            <input type="text" name="alamat_asal" class="form-control" value="<?php echo $data['alamat_asal']; ?>" required>
        </div>
        <div class="form-group">
            <label>Alamat_Tujuan</label>
            <input type="text" name="alamat_tujuan" class="form-control" value="<?php echo $data['alamat_tujuan']; ?>" required>
        </div>
    <label>Nama Pelapor</label>
    <input type="text" name="nama_pelapor" class="form-control" value="<?php echo $data['nama_pelapor']; ?>" required>
      </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="data_pendatang.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
