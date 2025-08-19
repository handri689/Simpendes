<?php
// Koneksi ke database
include('koneksi.php');

// Mendapatkan ID dari URL
if (isset($_GET['id_kelahiran'])) {
    $id = $_GET['id_kelahiran'];

    // Query untuk mendapatkan data berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM kelahiran WHERE id_kelahiran= '$id'");
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
    $tempat_lahir= $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $alamat = $_POST['alamat'];
   

    // Query untuk mengupdate data
    $update = mysqli_query($koneksi, "UPDATE kelahiran SET 
    nama = '$nama', 
    tempat_lahir = '$tempat_lahir', 
    tanggal_lahir = '$tanggal_lahir', 
    jenis_kelamin = '$jenis_kelamin', 
    nama_ayah = '$nama_ayah', 
    nama_ibu = '$nama_ibu', 
    alamat = '$alamat'  /* Koma ditambahkan di sini */
    WHERE id_kelahiran= '$id'");


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
    <title>Edit Data Kelahiran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Data Kelahiran</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
        </div>
        <div class="form-group">
            <label>Tempat  Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $data['tempat_lahir']; ?>" required>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="text" name="tanggal_lahir" class="form-control" value="<?php echo $data['tanggal_lahir']; ?>" required>
        </div>
        <div class="form-group">
        <select class="form-control form-control-lg" name="jenis_kelamin" required>
               <option value="P">P</option>
               <option value="L">L</option>
               </select>
</div>

        <div class="form-group">
            <label>Nama Ayah</label>
            <input type="text" name="nama_ayah" class="form-control" value="<?php echo $data['nama_ayah']; ?>" required>
        </div>
        <div class="form-group">
            <label>Nama Ibu</label>
            <input type="text" name="nama_ibu" class="form-control" value="<?php echo $data['nama_ibu']; ?>" required>
        </div>
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
      </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="data_kelahiran.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
