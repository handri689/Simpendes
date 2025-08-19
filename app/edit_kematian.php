<?php
// Koneksi ke database
include('koneksi.php');

// Mendapatkan ID dari URL
if (isset($_GET['id_meninggal'])) {
    $id = $_GET['id_meninggal'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM db_meninggal WHERE id_meninggal= '$id'");
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
    $tanggal_lahir= $_POST['tanggal_lahir'];
    $tanggal_meninggal = $_POST['tanggal_meninggal'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $penyebap_kematian = $_POST['penyebap_kematian'];
    $tempat_meninggal = $_POST['tempat_meninggal'];
    $nama_pelapor = $_POST['nama_pelapor'];

    // Query untuk mengupdate data
    $update = mysqli_query($koneksi, "UPDATE db_meninggal SET 
    nama = '$nama', 
    tanggal_lahir = '$tanggal_lahir', 
    tanggal_meninggal = '$tanggal_meninggal', 
    jenis_kelamin = '$jenis_kelamin', 
    alamat = '$alamat', 
    penyebap_kematian = '$penyebap_kematian', 
    tempat_meninggal = '$tempat_meninggal',  /* Koma ditambahkan di sini */
    nama_pelapor = '$nama_pelapor' 
    WHERE id_meninggal= '$id'");


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
    <title>Edit Data Kematian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Data Kematian</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="text" name="tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>" required>
        </div>
        <div class="form-group">
            <label>Tanggal Meninggal</label>
            <input type="text" name="tanggal_meninggal" class="form-control" value="<?php echo $data['tanggal_meninggal']; ?>" required>
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
            <label>Penyebap Kematian</label>
            <input type="text" name="penyebap_kematian" class="form-control" value="<?php echo $data['penyebap_kematian']; ?>" required>
        </div>
        <div class="form-group">
            <label>Tempat Meninggal</label>
            <input type="text" name="tempat_meninggal" class="form-control" value="<?php echo $data['tempat_meninggal']; ?>" required>
        </div>
        <div class="form-group">
    <label>Nama Pelapor</label>
    <input type="text" name="nama_pelapor" class="form-control" value="<?php echo $data['nama_pelapor']; ?>" required>
      </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="data_kematian.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
