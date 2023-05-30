<html>
<head>
    <title>Update Data Gudang</title>
</head>
<body>
    <?php
    
    $conn = mysqli_connect('localhost', 'root', '', 'gudangdb');

    if(isset($_GET['kode_gudang'])) {
        $kode_gudang = $_GET['kode_gudang'];

        $query = "SELECT * FROM gudang WHERE kode_gudang='$kode_gudang'";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);

        if(isset($_POST['submit'])) {
            $new_kode_gudang = $_POST['kode_gudang'];
            $new_nama_gudang = $_POST['nama_gudang'];
            $new_lokasi = $_POST['lokasi'];

            $update = "UPDATE gudang SET kode_gudang='$new_kode_gudang', 
            nama_gudang='$new_nama_gudang', lokasi='$new_lokasi' WHERE kode_gudang='$kode_gudang'";
            mysqli_query($conn, $update);

            header('location: gudang.php');
        }

    }
    ?>
    <center>
    <h3>Update Data Gudang</h3>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Kode Gudang</td>
                <td>:</td>
                <td><input type="text" name="kode_gudang" value="<?php echo $data['kode_gudang']; ?>"></td>
            </tr>
            <tr>
                <td>Nama Gudang</td>
                <td>:</td>
                <td><input type="text" name="nama_gudang" value="<?php echo $data['nama_gudang']; ?>"></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>:</td>
                <td><input type="text" name="lokasi" value="<?php echo $data['lokasi']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Update">
                </td>
            </tr>
        </table>
    </form>
    </center>
</body>
