<?php
include 'config.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $query = "SELECT * FROM Mahasiswa WHERE NIM = '$nim'";
    $result = mysqli_query($koneksi, $query);
    $studentData = mysqli_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $updatedNama = $_POST['nama'];
        $updatedGender = $_POST['gender'];
        $updatedTempatLahir = $_POST['tempat_lahir'];
        $updatedTanggalLahir = $_POST['tanggal_lahir'];
        $updatedUsia = $_POST['usia'];
        $updatedAlamat = $_POST['alamat'];

        $updateQuery = "UPDATE Mahasiswa SET Nama='$updatedNama', Gender='$updatedGender', TempatLahir='$updatedTempatLahir', TanggalLahir='$updatedTanggalLahir', Usia='$updatedUsia', Alamat='$updatedAlamat' WHERE NIM='$nim'";

        if (mysqli_query($koneksi, $updateQuery)) {
            header("Location: index.php?status=success_edit");
            exit();
        } else {
            header("Location: index.php?status=error_edit");
            exit();
        }
    }

    mysqli_close($koneksi);
} else {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="style.css">

</head>
<body class="centered-container">
    <h1>Edit Data Mahasiswa</h1>
    <form action="edit.php?nim=<?php echo $nim; ?>" method="POST">
        <label>NIM:</label>
        <input type="text" name="nim" value="<?php echo $studentData['NIM']; ?>" disabled><br>

        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo $studentData['Nama']; ?>" required><br>

        <label>Gender:</label>
        <select name="gender" required>
            <option value="L" <?php if ($studentData['Gender'] === 'L') echo 'selected'; ?>>Laki-Laki</option>
            <option value="P" <?php if ($studentData['Gender'] === 'P') echo 'selected'; ?>>Perempuan</option>
        </select><br>

        <label>Tempat Lahir:</label>
        <input type="text" name="tempat_lahir" value="<?php echo $studentData['TempatLahir']; ?>" required><br>

        <label>Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" value="<?php echo $studentData['TanggalLahir']; ?>" required><br>

        <label>Usia:</label>
        <input type="number" name="usia" value="<?php echo $studentData['Usia']; ?>" required><br>

        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?php echo $studentData['Alamat']; ?>" required><br>

        <div>
            <button type="button" onclick="window.location='index.php'">Cancel</button>
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>


