<html>
<head>
    <title>Data Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        h3 {
            margin-bottom: 10px;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        table, th, td {
            border: 1px solid black;
        }
        
        th, td {
            padding: 8px;
            text-align: left;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 5px;
        }
        
        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <center>
        <h3>Masukkan Data Buku :</h3>
        <form action="gabutt.php" method='POST'>
            <table border='0' width='30%'>
                <tr>
                    <td width='25%'>Kode Buku</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name='kode_buku' size='10'></td>
                </tr>
                <tr>
                    <td width='25%'>Nama Buku</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name='nama_buku' size='30'></td>
                </tr>
                <tr>
                    <td width='25%'>Kode Jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name='kode_jenis' size='10'></td>
                </tr>
            </table>
            <input type="submit" value='Masukkan' name='submit'>
        </form>
        <br><br>
        <h3>Masukkan Data Jenis Buku :</h3>
        <form action="gabutt.php" method='POST'>
            <table border='0' width='30%'>
                <tr>
                    <td width='25%'>Kode Jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name='kode_jenis' size='10'></td>
                </tr>
                <tr>
                    <td width='25%'>Nama Jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name='nama_jenis' size='30'></td>
                </tr>
                <tr>
                    <td width='25%'>Keterangan Jenis</td>
                    <td width='5%'>:</td>
                    <td width='65%'><input type="text" name='keterangan_jenis' size='10'></td>
                </tr>
            </table>
            <input type="submit" value='Masukkan' name='submit_jenis'>
        </form>
        <?php
        // Koneksi ke database
        $conn = mysqli_connect('localhost', 'root', '', 'bukudb');
        
        // Fungsi untuk memasukkan data buku baru ke tabel 'buku'
        function insert_buku($kode_buku, $nama_buku, $kode_jenis) {
            global $conn;
            $query = "INSERT INTO buku (kode_buku, nama_buku, kode_jenis) VALUES ('$kode_buku', '$nama_buku', '$kode_jenis')";
            if (mysqli_query($conn, $query)) {
                echo "<br>Data buku berhasil dimasukkan.";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
        
        // Fungsi untuk memperbarui data buku
        function update_buku($kode_buku, $nama_buku, $kode_jenis) {
            global $conn;
            $query = "UPDATE buku SET nama_buku='$nama_buku', kode_jenis='$kode_jenis' WHERE kode_buku='$kode_buku'";
            if (mysqli_query($conn, $query)) {
                echo "Data buku dengan kode $kode_buku berhasil diperbarui.";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
        
        // Fungsi untuk menghapus data buku
        function delete_buku($kode_buku) {
            global $conn;
            $query = "DELETE FROM buku WHERE kode_buku='$kode_buku'";
            if (mysqli_query($conn, $query)) {
                echo "Data buku dengan kode $kode_buku berhasil dihapus.";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
        
        // Fungsi untuk memasukkan data jenis buku baru ke tabel 'jenis_buku'
        function insert_jenis_buku($kode_jenis, $nama_jenis, $keterangan_jenis) {
            global $conn;
            $query = "INSERT INTO jenis_buku (kode_jenis, nama_jenis, keterangan_jenis) VALUES ('$kode_jenis', '$nama_jenis', '$keterangan_jenis')";
            if (mysqli_query($conn, $query)) {
                echo "<br>Data jenis buku berhasil dimasukkan.";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
        
        // Fungsi untuk memperbarui data jenis buku
        function update_jenis_buku($kode_jenis, $nama_jenis, $keterangan_jenis) {
            global $conn;
            $query = "UPDATE jenis_buku SET nama_jenis='$nama_jenis', keterangan_jenis='$keterangan_jenis' WHERE kode_jenis='$kode_jenis'";
            if (mysqli_query($conn, $query)) {
                echo "Data jenis buku dengan kode $kode_jenis berhasil diperbarui.";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
        
        // Fungsi untuk menghapus data jenis buku
        function delete_jenis_buku($kode_jenis) {
            global $conn;
            $query = "DELETE FROM jenis_buku WHERE kode_jenis='$kode_jenis'";
            if (mysqli_query($conn, $query)) {
                echo "Data jenis buku dengan kode $kode_jenis berhasil dihapus.";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        }
        
        // Menangani submit form buku
        if (isset($_POST['submit'])) {
            $kode_buku = $_POST['kode_buku'];
            $nama_buku = $_POST['nama_buku'];
            $kode_jenis = $_POST['kode_jenis'];
            insert_buku($kode_buku, $nama_buku, $kode_jenis);
        }
        
        // Menangani submit form jenis buku
        if (isset($_POST['submit_jenis'])) {
            $kode_jenis = $_POST['kode_jenis'];
            $nama_jenis = $_POST['nama_jenis'];
            $keterangan_jenis = $_POST['keterangan_jenis'];
            insert_jenis_buku($kode_jenis, $nama_jenis, $keterangan_jenis);
        }
        
        // Menampilkan data buku
        $query_buku = "SELECT buku.kode_buku, buku.nama_buku, jenis_buku.nama_jenis FROM buku JOIN jenis_buku ON buku.kode_jenis = jenis_buku.kode_jenis";
        $result_buku = mysqli_query($conn, $query_buku);
        
        if (mysqli_num_rows($result_buku) > 0) {
            echo "<hr>";
            echo "<h3>Data Buku</h3>";
            echo "<table border='1' width='50%'>";
            echo "<tr>
                    <td align='center' width='20%'><b>Kode Buku</b></td>
                    <td align='center' width='30%'><b>Nama Buku</b></td>
                    <td align='center' width='20%'><b>Jenis Buku</b></td>
                    <td align='center' width='15%'><b>Aksi</b></td>
                </tr>";
        
            while ($row = mysqli_fetch_assoc($result_buku)) {
                echo "<tr>";
                echo "<td>".$row['kode_buku']."</td>";
                echo "<td>".$row['nama_buku']."</td>";
                echo "<td>".$row['nama_jenis']."</td>";
                echo "<td align='center'>
                        <a href='update_buku.php?kode_buku=".$row['kode_buku']."'>Update</a> |
                        <a href='delete_buku.php?kode_buku=".$row['kode_buku']."'>Delete</a>
                    </td>";
                echo "</tr>";
            }
        
            echo "</table>";
            echo "<hr>";
        } else {
            echo "Tidak ada data buku.";
        }
        
        // Menampilkan data jenis buku
        $query_jenis = "SELECT * FROM jenis_buku";
        $result_jenis = mysqli_query($conn, $query_jenis);
        
        if (mysqli_num_rows($result_jenis) > 0) {
            echo "<hr>";
            echo "<h3>Data Jenis Buku</h3>";
            echo "<table border='1' width='50%'>";
            echo "<tr>
                    <td align='center' width='20%'><b>Kode Jenis</b></td>
                    <td align='center' width='30%'><b>Nama Jenis</b></td>
                    <td align='center' width='40%'><b>Keterangan Jenis</b></td>
                    <td align='center' width='10%'><b>Aksi</b></td>
                </tr>";
        
            while ($row = mysqli_fetch_assoc($result_jenis)) {
                echo "<tr>";
                echo "<td>".$row['kode_jenis']."</td>";
                echo "<td>".$row['nama_jenis']."</td>";
                echo "<td>".$row['keterangan_jenis']."</td>";
                echo "<td align='center'>
                        <a href='update_jenis.php?kode_jenis=".$row['kode_jenis']."'>Update</a> |
                        <a href='delete_jenis.php?kode_jenis=".$row['kode_jenis']."'>Delete</a>
                    </td>";
                echo "</tr>";
            }
        
            echo "</table>";
            echo "<hr>";
        } else {
            echo "Tidak ada data jenis buku.";
        }
        
        // Menutup koneksi ke database
        mysqli_close($conn);
        ?>
    </center>
</body>
</html>
