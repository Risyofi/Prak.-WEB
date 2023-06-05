<?php
session_start();
if ($_SESSION['status'] != "Member") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Member</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Selamat datang, <?php echo $_SESSION['nama']; ?></h1>
  <div class="member-content">
    <!-- Tampilan konten spesifik untuk member -->
    <p>Ini adalah halaman dashboard member.</p>
  </div>
  <br>
  Silakan <a href="logout.php" class="logout-link">logout</a>.
</body>
</html>
