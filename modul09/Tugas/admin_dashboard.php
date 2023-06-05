<?php
session_start();
if ($_SESSION['status'] != "Administrator") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Administrator</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Selamat datang, <?php echo $_SESSION['nama']; ?></h1>
  <div class="admin-content">
    <!-- Tampilan konten spesifik untuk administrator -->
    <p>Ini adalah halaman dashboard administrator.</p>
  </div>
  <br>
  Silakan <a href="logout.php" class="logout-link">logout</a>.
</body>
</html>