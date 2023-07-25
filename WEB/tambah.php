<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST["nim"];
    $nama = $_POST["nama"];
    $gender = $_POST["gender"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $usia = $_POST["usia"];
    $alamat = $_POST["alamat"];

    $query_check_nim = "SELECT NIM FROM Mahasiswa WHERE NIM = '$nim'";
    $result_check_nim = mysqli_query($koneksi, $query_check_nim);

    if (mysqli_num_rows($result_check_nim) > 0) {
         header("Location: index.php?status=duplicate");
        exit();
    }

    $query = "INSERT INTO Mahasiswa (NIM, Nama, Gender, TempatLahir, TanggalLahir, Usia, Alamat)
              VALUES ('$nim', '$nama', '$gender', '$tempat_lahir', '$tanggal_lahir', '$usia', '$alamat')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?status=success");
        exit();
    } else {
        header("Location: index.php?status=error");
        exit();
    }
}

mysqli_close($koneksi);
?>


<!DOCTYPE html>
<html>
<head>
    <title>CRUD Mahasiswa - Tambah</title>
    <link rel="stylesheet" href="style.css">

</head>
<body class="centered-container">
    <h2>Tambah Mahasiswa</h2>
    <form action="tambah.php" method="POST">
        <label>NIM:</label>
        <input type="text" name="nim" required><br>

        <label>Nama:</label>
        <input type="text" name="nama" required><br>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select><br>

        <label>Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" required><br>

        <label>Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" required><br>

        <label>Usia:</label>
        <input type="number" name="usia" required><br>

        <label>Alamat:</label>
        <input type="text" name="alamat" required><br>

        <div>
            <button type="button" onclick="window.location='index.php'">Cancel</button>
            <input type="submit" value="Simpan">
        </div>
    </form>

</body>
</html>
