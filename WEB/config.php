<?php
$koneksi = mysqli_connect("localhost", "root", "", "web");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>