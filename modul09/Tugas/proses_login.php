<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
$koneksi = mysqli_connect('localhost', 'root', '', 'informatikadb');
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$query = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($query);

if ($row) {
    $_SESSION['username'] = $row['username'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['status'] = $row['status'];

    if ($row['status'] == "Administrator") {
        header("Location: admin_dashboard.php");
    } elseif ($row['status'] == "Member") {
        header("Location: member_dashboard.php");
    }
} else {
    header("Location: login.php?login_error=true");
}
?>
