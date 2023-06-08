<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'informatikadb');
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$status = $_POST['status'];

$sql = "SELECT * FROM user WHERE username='$username'";
$query = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($query);

if ($row) {
    header("Location: sign_up.php?error=username_exists");
    exit();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO user (username, password, nama, status) VALUES ('$username', '$hashedPassword', '$nama', '$status')";
$query = mysqli_query($koneksi, $sql);

if ($query) {
     header("Location: login.php");
} else {
    header("Location: sign_up.php?error=signup_failed");
}
