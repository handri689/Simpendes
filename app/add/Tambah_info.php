<?php
include '../koneksi.php'; // koneksi ke database

$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$status = $_POST['status'];

// Cek apakah ada file yang diunggah dan tidak ada error
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "../app/gambar/gambar_perangkat/";
    $target_file = $target_dir . basename($gambar);
    
    // Cek apakah direktori target ada
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Buat direktori jika tidak ada
    }

    // Pindahkan file yang diunggah ke direktori target
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
        echo "File " . htmlspecialchars($gambar) . " berhasil diunggah.";
        $check = true; // Set variabel $check sebagai true jika file berhasil diunggah
    
        // Simpan data ke database
        $query_insert = "INSERT INTO info_desa (nama, jabatan, jenis_kelamin, pendidikan_terakhir, status, gambar) 
                         VALUES ('$nama', '$jabatan', '$jenis_kelamin', '$pendidikan_terakhir', '$status', '$gambar')";
        if (mysqli_query($koneksi, $query_insert)) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
     // Set variabel $check sebagai false jika terjadi kesalahan
    }

// Cek jika direktori tujuan ada
if (!is_dir($target_dir)) {
    echo "Direktori tujuan tidak ada.";
    exit;
}

// Proses upload gambar hanya jika file gambar tersedia
if (isset($check) && $check === true) {
    // Simpan path gambar ke database atau lakukan hal lain
    echo "Gambar berhasil diunggah.";
} else {
    header('Location:../index.php?page=info_desa.php');
    // Jika Anda ingin memberikan pesan bahwa gambar belum diunggah, tambahkan di sini
    echo "Gambar belum diunggah atau terjadi kesalahan.";
}
?>
