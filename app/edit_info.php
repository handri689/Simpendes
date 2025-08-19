<?php
// Koneksi ke database
include('koneksi.php');

// Mendapatkan ID dari URL
if (isset($_GET['id_desa'])) {
    $id = $_GET['id_desa'];

    // Pastikan koneksi berhasil
    if ($koneksi) {
        // Query untuk mendapatkan data berdasarkan ID
        $query = mysqli_query($koneksi, "SELECT * FROM info_desa WHERE id_desa = '$id'");
        $data = mysqli_fetch_array($query);

        if (!$data) {
            echo "Data tidak ditemukan!";
            exit;
        }
    } else {
        echo "Koneksi ke database gagal!";
        exit;
    }
} else {
    echo "ID tidak ditemukan!";
    exit;
}

// Proses update data jika form disubmit
if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $status = $_POST['status'];
    $gambar = $data['gambar']; // Default gambar dari data lama

    // Cek apakah ada gambar baru yang diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['name'] != '') {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $path = "../app/gambar/gambar_perangkat/" . $gambar;
        move_uploaded_file($tmp, $path);
    }

    // Query untuk mengupdate data
    $update = mysqli_query($koneksi, "UPDATE info_desa SET 
        nama = '$nama', 
        jabatan = '$jabatan', 
        jenis_kelamin = '$jenis_kelamin', 
        pendidikan_terakhir = '$pendidikan_terakhir', 
        status = '$status',
        gambar = '$gambar'
        WHERE id_desa= '$id'");

    if ($update) {
        echo "<script>alert('Data berhasil diupdate!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate!');</script>";
    }
}
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penduduk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Data Penduduk</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
        </div>
        <div class="form-group">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="<?php echo $data['jabatan']; ?>" required>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control form-control-lg" name="jenis_kelamin" required>
                <option value="L" <?php if($data['jenis_kelamin'] == 'L') echo 'selected'; ?>>L</option>
                <option value="P" <?php if($data['jenis_kelamin'] == 'P') echo 'selected'; ?>>P</option>
            </select>
        </div>
        <div class="form-group">
            <label>Pendidikan Terakhir</label>
            <input type="text" name="pendidikan_terakhir" class="form-control" value="<?php echo $data['pendidikan_terakhir']; ?>" required>
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="<?php echo $data['status']; ?>" required>
        </div>
        <div class="form-group">
            <label>Gambar</label>
            <input type="file" class="form-control" name="gambar">
            <img src="../app/gambar/gambar_perangkat/<?php echo $data['gambar']; ?>" alt="Gambar" width="100" class="mt-2">
        </div>

        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
