<?php
include 'config.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $deleteQuery = "DELETE FROM Mahasiswa WHERE NIM='$nim'";
    if (mysqli_query($koneksi, $deleteQuery)) {
        header("Location: index.php?status=success_delete");
        exit();
    } else {
        header("Location: index.php?status=error_delete");
        exit();
    }
    mysqli_close($koneksi);
} else {
    header("Location: index.php");
    exit();
}
?>
