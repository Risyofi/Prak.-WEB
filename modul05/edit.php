<html>
<head>
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'informatika');

    if(isset($_GET['nim'])) {
        $nim = $_GET['nim'];

        $query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);

        if(isset($_POST['submit'])) {
            $new_nim = $_POST['nim'];
            $new_nama = $_POST['nama'];
            $new_kelas = $_POST['kelas'];
            $new_alamat = $_POST['alamat'];

            $update = "UPDATE mahasiswa SET nim='$new_nim', nama='$new_nama', 
            kelas='$new_kelas', alamat='$new_alamat' WHERE nim='$nim'";
            mysqli_query($conn, $update);

            header('location:form.php');
        }
    }
    ?>
    <center>
    <h3>Edit Data Mahasiswa</h3>
    <form action="" method="POST">
        <table>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="text" name="nim" value="<?php echo $data['nim']; ?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    <input type="radio" value='A' <?php if($data['kelas'] == 'A') echo 
                    'checked'; ?> name='kelas'>A
                    <input type="radio" value='B' <?php if($data['kelas'] == 'B') echo 
                    'checked'; ?> name='kelas'>B
                    <input type="radio" value='C' <?php if($data['kelas'] == 'C') echo 
                    'checked'; ?> name='kelas'>C
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>
    </center>
    
    
</body>
</html>
