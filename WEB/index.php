<!DOCTYPE html>
<html>
<head>
    <title>CRUD Mahasiswa</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <button type="button" onclick="window.location='tambah.php'">Tambah Data</button>
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Gender</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Usia</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'config.php';

        $query = "SELECT * FROM Mahasiswa";
        $result = mysqli_query($koneksi, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['NIM'] . "</td>";
            echo "<td>" . $row['Nama'] . "</td>";
            echo "<td>" . $row['Gender'] . "</td>";
            echo "<td>" . $row['TempatLahir'] . "</td>";
            echo "<td>" . $row['TanggalLahir'] . "</td>";
            echo "<td>" . $row['Usia'] . "</td>";
            echo "<td>" . $row['Alamat'] . "</td>";
            echo "<td>
                    <a href='edit.php?nim=" . $row['NIM'] . "'>Edit</a> |
                    <a href='hapus.php?nim=" . $row['NIM'] . "'>Hapus</a>
                  </td>";
            echo "</tr>";
        }

        mysqli_close($koneksi);
        ?>
    </table>

    <?php
    if (isset($_GET["status"])) {
        if ($_GET["status"] === "success") {
            echo "<p>Berhasil ditambahkan!</p>";
        } elseif ($_GET["status"] === "duplicate") {
            echo "<p>Error: NIM duplicate.</p>";
        } elseif ($_GET["status"] === "error") {
            echo "<p>Error: Gagal menambah data.</p>";
        } elseif ($_GET["status"] === "success_edit") {
            echo "<p>Berhasil diupdate!</p>";
        } elseif ($_GET["status"] === "error_edit") {
            echo "<p>Error: Gagal mengupdate data.</p>";
        } elseif ($_GET["status"] === "success_delete") {
            echo "<p>Berhasil dihapus data.</p>";
        } elseif ($_GET["status"] === "error_delete") {
            echo "<p>Error: Gagal menghapus data.</p>";
        }
    }
    ?>

</body>
</html>
