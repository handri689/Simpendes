<?php
// Koneksi ke database
include('koneksi.php');

// Mendapatkan ID dari URL
if (isset($_GET['id_pindah'])) {
    $id = $_GET['id_pindah'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM pindah WHERE id_pindah= '$id'");
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
    $tanggal_pindah= $_POST['tanggal_pindah'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tujuan = $_POST['tujuan'];
    $nik = $_POST['nik'];

    // Query untuk mengupdate data
    $update = mysqli_query($koneksi, "UPDATE pindah SET 
    nama='$nama',
    tanggal_pindah = '$tanggal_pindah', 
    jenis_kelamin = '$jenis_kelamin', 
    tujuan = '$tujuan', 
    nik = '$nik'
    WHERE id_pindah= '$id'");


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
    <title>Edit Data Pindah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Data Pindah</h2>
    <form method="POST">
    <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
        </div>
    <div class="form-group">
            <label>Tanggal Pindah</label>
            <input type="text" name="tanggal_pindah" class="form-control" value="<?php echo $data['tanggal_pindah']; ?>" required>
        </div>  
    <div class="form-group">
    <label>Jenis Kelamin</label>
    <select class="form-control form-control-lg" name="jenis_kelamin" required>
   <option value="L">L</option>
   <option value="P">P</option>
        </select>

    <div class="form-group">
            <label>Tujuan</label>
            <input type="text" name="tujuan" class="form-control" value="<?php echo $data['tujuan']; ?>" required>
        </div>
        <div class="form-group">
            <label>Nik</label>
            <input type="text" name="nik" class="form-control" value="<?php echo $data['nik']; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="data_pindah.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
