<?php
// Menghubungkan ke database
$conn = mysqli_connect("localhost", "root", "", "bukudb");
// Mendapatkan kode jenis dari URL
$kode_jenis = $_GET['kode_jenis'];

// Mendapatkan data jenis buku berdasarkan kode jenis
$query = "SELECT * FROM jenis_buku WHERE kode_jenis='$kode_jenis'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Memeriksa apakah data jenis buku ditemukan
if (!$row) {
    echo "Data jenis buku tidak ditemukan.";
    exit;
}

// Menangani submit form update jenis buku
if (isset($_POST['submit'])) {
    $nama_jenis = $_POST['nama_jenis'];
    $keterangan_jenis = $_POST['keterangan_jenis'];

    // Update data jenis buku
    $query_update = "UPDATE jenis_buku SET nama_jenis='$nama_jenis', keterangan_jenis='$keterangan_jenis' WHERE kode_jenis='$kode_jenis'";
    if (mysqli_query($conn, $query_update)) {
        echo "Data jenis buku berhasil diperbarui.";
        header("Location: gabutt.php"); // Ganti "index.php" dengan halaman yang sesuai
        exit;
    } else {
        echo "Error: " . $query_update . "<br>" . mysqli_error($conn);
    }
}

// Menutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Jenis Buku</title>
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
        textarea {
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
    <h2>Update Jenis Buku</h2>
    <form method="post" action="">
        <label for="nama_jenis">Nama Jenis:</label>
        <input type="text" name="nama_jenis" value="<?php echo $row['nama_jenis']; ?>"><br><br>
        <label for="keterangan_jenis">Keterangan Jenis:</label>
        <textarea name="keterangan_jenis"><?php echo $row['keterangan_jenis']; ?></textarea><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
