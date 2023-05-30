<?php
// Menghubungkan ke database
$conn = mysqli_connect("localhost", "root", "", "bukudb");

// Mendapatkan kode buku dari URL
$kode_buku = $_GET['kode_buku'];

// Menghapus data buku
$query_delete = "DELETE FROM buku WHERE kode_buku='$kode_buku'";
if (mysqli_query($conn, $query_delete)) {
    echo "Data buku berhasil dihapus.";
    header("Location: gabutt.php"); // Ganti "index.php" dengan halaman yang sesuai
    exit;
} else {
    echo "Error: " . $query_delete . "<br>" . mysqli_error($conn);
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
