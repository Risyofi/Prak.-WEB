<?php
// Menghubungkan ke database
$conn = mysqli_connect("localhost", "root", "", "bukudb");

// Memeriksa apakah parameter kode_buku tersedia
if (isset($_GET['kode_buku'])) {
    // Mendapatkan kode buku dari URL
    $kode_buku = $_GET['kode_buku'];

    // Mendapatkan data buku berdasarkan kode buku
    $query = "SELECT * FROM buku WHERE kode_buku='$kode_buku'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Memeriksa apakah data buku ditemukan
    if (!$row) {
        echo "Data buku tidak ditemukan.";
        exit;
    }

    // Menangani submit form update buku
    if (isset($_POST['submit'])) {
        $kode_buku = $_POST['kode_buku'];
        $nama_buku = $_POST['nama_buku'];
        $kode_jenis = $_POST['kode_jenis'];

        // Memeriksa apakah kode_jenis yang dimasukkan ada dalam tabel jenis_buku
        $query_cek_jenis = "SELECT * FROM jenis_buku WHERE kode_jenis='$kode_jenis'";
        $result_cek_jenis = mysqli_query($conn, $query_cek_jenis);
        if (mysqli_num_rows($result_cek_jenis) > 0) {
            // Update data buku
            $query_update = "UPDATE buku SET kode_buku='$kode_buku', nama_buku='$nama_buku', kode_jenis='$kode_jenis' WHERE kode_buku='" . $row['kode_buku'] . "'";

            if (mysqli_query($conn, $query_update)) {
                echo "Data buku berhasil diperbarui.";
                header("Location: gabutt.php"); // Ganti "index.php" dengan halaman yang sesuai
                exit;
            } else {
                echo "Error: " . $query_update . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Kode jenis tidak valid.";
        }
    }
} else {
    echo "Kode buku tidak tersedia.";
    exit;
}

// Menutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            width: 50%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="submit"] {
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
    <h2>Update Buku</h2>
    <form method="post" action="">
        <label for="kode_buku">Kode Buku:</label>
        <input type="text" name="kode_buku" value="<?php echo $row['kode_buku']; ?>"><br><br>
        <label for="nama_buku">Nama Buku:</label>
        <input type="text" name="nama_buku" value="<?php echo $row['nama_buku']; ?>"><br><br>
        <label for="kode_jenis">Kode Jenis:</label>
        <input type="text" name="kode_jenis" value="<?php echo $row['kode_jenis']; ?>"><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
