<?php
// Menghubungkan ke database
$conn = mysqli_connect("localhost", "root", "", "bukudb");

// Mendapatkan kode jenis dari URL
$kode_jenis = $_GET['kode_jenis'];

// Menghapus data jenis buku
$query_delete = "DELETE FROM jenis_buku WHERE kode_jenis='$kode_jenis'";
if (mysqli_query($conn, $query_delete)) {
    echo "Data jenis buku berhasil dihapus.";
    header("Location: gabutt.php"); // Ganti "index.php" dengan halaman yang sesuai
    exit;
} else {
    echo "Error: " . $query_delete . "<br>" . mysqli_error($conn);
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
